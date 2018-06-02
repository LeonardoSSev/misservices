<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Permission extends Model
{
    public function roles(){
        return $this->belongsToMany(\App\Role::class);
    }

    public function getPermission($permission, $pagination){
        $result = DB::table('permissions')
        ->where('permissions.name', 'like', '%'. $permission . '%')
        ->paginate($pagination);

        return $result;
    }
}
