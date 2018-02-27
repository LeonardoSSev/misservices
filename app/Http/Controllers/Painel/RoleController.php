<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('painel.roles.home', compact('roles'));
    }

    public function createRole()
    {
        return view('painel.roles.create');
    }

    public function storeRole(Request $request)
    {
        $role = new Role;

        $role->name = $request->name;
        $role->description = $request->description;

        $role->save();

        return redirect('/admin/roles');
    }

    public function editRole($idRole)
    {
        $role = Role::find($idRole);

        return view('painel.roles.edit', compact('role'));
    }

    public function updateRole(Request $request, $idRole)
    {
        $role = Role::find($idRole);

        $role->name = $request->name;
        $role->description = $request->description;

        $role->save();

        return redirect('admin/roles');
    }

    public function viewRole($idRole)
    {
        $role = Role::find($idRole);

        return view('painel.roles.view', compact('role'));
    }

    public function usersRole($idRole)
    {
        $role = Role::find($idRole);

        $users = $role->users()->get();

        return view('painel.roles.users', compact(['users', 'role']));
    }

    public function permissionsRole($idRole)
    {
        $role = Role::find($idRole);

        $permissions = $role->permissions()->get();

        return view('painel.roles.permissions', compact(['permissions', 'role']));
    }
    
    public function deleteRole($idRole)
    {
        Role::destroy($idRole);

        return redirect()->back();
    }
}
