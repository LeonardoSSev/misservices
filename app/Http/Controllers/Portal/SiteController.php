<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use Illuminate\Support\Facades\DB;


class SiteController extends Controller
{
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

    public function showServices()
    {
        $users = array();
        $services = DB::table('categories')
                        ->join('services', 'services.category_id', '=', 'categories.id')
                        ->join('users', 'services.user_id', '=', 'users.id')
                        ->select('categories.name as cat_name', 'services.name', 'services.description',
                            'users.id as user_id', 'users.name as user_name')
                        ->get();

        return view('portal.categories', compact('services'));
    }

}
