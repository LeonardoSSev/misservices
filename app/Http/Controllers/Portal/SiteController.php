<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    private $numberPagination = 10;

    public function index()
    {
        return view('portal.home');
    }

    public function admin()
    {
        return view('painel.admin');
    }

    public function howItWork()
    {
        return view('portal.how');
    }

    public function contact()
    {
        return view('portal.contact');
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
                            'users.name as user_name')
                        ->where([['categories.id', '=', $category_id], ['users.id', '<>', \Auth::user()->id]])
                        ->orderBy('services.name', 'asc')
                        ->paginate($this->numberPagination);
        return view('portal.user.search.services', compact(['services', 'category']));
    }

    public function showUserServiceDetails(int $userId, int $serviceId)
    {
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
                                  'rates.id as ratesId', 'rates.comment as comment', 'rates.rate as rate', 'users.id 
                                  as userId', 'users.name as userName'
                              )
                              ->limit(5)
                              ->get();

        $averageRate = $this->getAverageRateProvidedService($userId);

        return view('portal.user.search.user_service', compact(['serviceDetails', 'averageRate']));
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

}
