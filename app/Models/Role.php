<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    //
    public function permissions(){
        return $this->belongsToMany(\App\Permission::class);
    }

    public function users(){
        return $this->belongsToMany(\App\User::class);
    }

    public function getRoles($role, $pagination){
        $result = DB::table('roles')
        ->where('roles.name', 'like', '%'. $role . '%')
        ->paginate($pagination);

        return $result;
    }
}
