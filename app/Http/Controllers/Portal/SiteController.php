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




}
