<?php

namespace App\Http\Controllers\Portal;


use App\ProvidedService;

use App\Category;
use App\PhoneType;
use App\User;
use App\Service;
use App\Phone;
use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Helper;

class SiteController extends Controller
{
    private $numberPagination = 10;

    public function index()
    {
        return view('portal.home');
    }

    public function admin()
    {
        $totalCategories = Category::all()->count();
        $totalPermissions = Permission::all()->count();
        $totalPhones = Phone::all()->count();
        $totalPhoneTypes = PhoneType::all()->count();
        $totalRoles = Role::all()->count();
        $totalServices = Service::all()->count();
        $totalUsers = User::all()->count();

        return view('painel.admin', compact(['totalCategories', 'totalPermissions', 'totalPhones', 'totalPhoneTypes', 'totalRoles', 'totalServices', 'totalUsers']));
    }

    public function howItWork()
    {
        return view('portal.how');
    }

    public function contact(string $subject = null)
    {
        $emailContent = null;

        if ($subject !== null) {
            $emailContent = Helper::getContactEmailData($subject);
        }

        return view('portal.contact', compact(['emailContent']));
    }

    public function rolesPermissions()
    {
        $nameUser = auth()->user()->name;
        echo("<h1>{$nameUser}</h1>");

        foreach (auth()->user()->roles as $role) {
            echo "<b>$role->name</b> -> ";

            $permissions = $role->permissions;
            foreach($permissions as $permission) {
                echo " $permission->name , ";
            }

            echo '<hr>';
        }
    }

    public function showCategories()
    {
        $categories = Category::orderBy('name', 'asc')->paginate($this->numberPagination);


        return view('portal.user.search.categories', compact('categories'));
    }

    public function showServices(int $category_id)
    {
        $category = Category::find($category_id);
        $services = DB::table('categories')
                        ->join('services', 'services.category_id', '=', 'categories.id')
                        ->join('users', 'services.user_id', '=', 'users.id')
                        ->select('services.id', 'services.name', 'services.description', 'users.id as user_id',
                            'users.name as user_name', 'users.image as user_image')
                        ->where([['categories.id', '=', $category_id], ['users.id', '<>', \Auth::user()->id]])
                        ->orderBy('services.name', 'asc')
                        ->paginate($this->numberPagination);
        return view('portal.user.search.services', compact(['services', 'category']));
    }

    public function getSearchService(){
        if( !empty(\Auth::user()->id) ){
            if( isset($_GET['service']) ){
                $serviceName = $_GET['service'];
                $service = new Service();
                $services = $service->getServiceByName($serviceName);
                return view('portal.user.search.services', compact(['services']));
            }
        } else{
            return view('auth.register');
        }
    }

    public function showUserServiceDetails(int $userId, int $serviceId)
    {
        $service = Service::find($serviceId);
        $serviceDetails = DB::table('provided_services')
                              ->join('rates', 'provided_services.id', '=', 'rates.provided_service_id')
                              ->join('users', 'provided_services.client_id', '=', 'users.id')
                              ->where([
                                  ['provided_services.service_id', '=', $serviceId],
                                  ['provided_services.provider_id', '=', $userId],
                                  ['provided_services.status', '=', 'PAID']
                              ])
                              ->select(
                                  'provided_services.id as providedServiceId', 'provided_services.client_id as clientId',
                                  'provided_services.status as providedserviceStatus', 'provided_services.price as price',
                                  'rates.id as ratesId', 'rates.rate as rate', 'users.id 
                                  as userId', 'users.name as userName', 'users.image as userImage'
                              )
                              ->limit(5)
                              ->get();

        $averageRate = $this->getAverageRateProvidedService($userId);

        return view('portal.user.search.user_service', compact(['serviceDetails', 'averageRate', 'service']));
    }

    private function getAverageRateProvidedService(int $providerId)
    {
        $summedRate = floatval(DB::table('provided_services')
            ->join('rates', 'provided_services.id', '=', 'rates.provided_service_id')
            ->where('provided_services.provider_id', '=', $providerId )
            ->sum('rate'));

        $rateTimes = intval(DB::table('provided_services')
            ->join('rates', 'provided_services.id', '=', 'rates.provided_service_id')
            ->where('provided_services.provider_id', '=', $providerId)
            ->count('rate'));

        $average = $rateTimes == 0 ? 0 : $summedRate / $rateTimes;

        return $average;
    }

    public function requestProvidedService(int $serviceId)
    {
        $service = Service::find($serviceId);
        $provided_service = new ProvidedService();

        $provided_service->provider_id = $service->user_id;
        $provided_service->client_id = Auth()->user()->id;
        $provided_service->service_id = $service->id;
        $provided_service->category_id = $service->category_id;
        $provided_service->status = "OPENED";
        $provided_service->save();

        return redirect()->route('user.service.details', [$service->user_id, $service->id])->with('status', 'O serviço foi solicitado!');
    }

}
