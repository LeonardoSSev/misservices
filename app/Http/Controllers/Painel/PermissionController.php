<?php

namespace App\Http\Controllers\Painel;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return view('painel.permissions.home', compact('permissions'));
    }

    public function createPermission()
    {
        $roles = Role::all();

        return view('painel.permissions.create', compact('roles'));
    }

    public function storePermission(Request $request)
    {
        $permission = new Permission;

        $permission->name = $request->name;
        $permission->description = $request->description;

        $permission->save();
        $permission->roles()->sync($request->role);

        return redirect()->route('admin.permissions');
    }


    public function editPermission($idPermission)
    {
        $permission = Permission::find($idPermission);

        $roles = Role::all();

        return view('painel.permissions.edit', compact(['permission', 'roles']));
    }

    public function updatePermission(Request $request, $idPermission)
    {
        $permission = Permission::find($idPermission);

        $permission->name = $request->name;
        $permission->description = $request->description;

        $permission->save();
        $permission->roles()->sync($request->role);

        return redirect()->route('admin.permissions');
    }

    public function viewPermission($idPermission)
    {
        $permission = Permission::find($idPermission);

        return view('painel.permissions.view', compact('permission'));
    }
    
    public function deletePermission($idPermission)
    {
        Permission::destroy($idPermission);

        return redirect()->route('admin.permissions');
    }
}
