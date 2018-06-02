<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PhoneType extends Model
{
    public function getPhoneType($phonetype, $pagination){
        $result = DB::table('phone_types')
        ->where('phone_types.name', 'like', '%'. $phonetype . '%')
        ->paginate($pagination);

        return $result;
    }
}
