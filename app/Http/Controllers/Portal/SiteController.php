<?php

namespace App\Http\Controllers\Portal;

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
                        ->where('categories.id', '=', $category_id)
                        ->orderBy('services.name', 'asc')
                        ->paginate($this->numberPagination);
        return view('portal.user.search.services', compact(['services', 'category']));
    }

    public function showUserServiceDetails(int $userId, int $serviceId)
    {
        $where = [['service_id', '=', $serviceId], ['provider_id', '=', $userId], ['status', '=', 'PAID']];
        $numberServices = DB::table('provided_services')
                              ->where($where)
                              ->count();
        $rateServices = DB::table('provided_services')
            ->where($where)
            ->sum('rate');

        $rate = $numberServices == 0 ? 0 : $rateServices / $numberServices;

        return view('portal.user.search.user_service', compact(['numberServices', 'rate']));
    }

}
