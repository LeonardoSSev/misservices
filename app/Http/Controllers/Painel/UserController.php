<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;

class UserController extends Controller
{
    private $numberPagination = 10;

    public function index()
    {
        $users = User::paginate($this->numberPagination);

        return view('painel.users.home', compact('users'));
    }

    public function createUser()
    {
        $roles = Role::all();

        return view('painel.users.create', compact('roles'));
    }

    public function storeUser(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->zipcode = $request->zipcode;
        $user->neighbourhood = $request->neighbourhood;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);

        $user->save();
        $user->roles()->sync($request->role);

        return redirect()->route('admin.users');
    }

    public function editUser($idUser)
    {
        $user = User::find($idUser);
        $roles = Role::all();

        return view('painel.users.edit', compact(['user', 'roles']));
    }

    public function updateUser(Request $request, $idUser)
    {
        $user = User::find($idUser);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->zipcode = $request->zipcode;
        $user->neighbourhood = $request->neighbourhood;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);

        $user->save();
        $user->roles()->sync($request->role);

        return redirect()->route('admin.users');
    }

    public function viewUser($idUser)
    {
        $user = User::find($idUser);

        return view('painel.users.view', compact('user'));
    }

    public function rolesUser($idUser)
    {
        $user = User::find($idUser);

        $roles = $user->roles()->get();

        return view('painel.users.roles', compact(['user', 'roles']));
    }

    public function deleteUser($idUser)
    {
        User::destroy($idUser);

        return redirect()->route('admin.users');
    }
}
