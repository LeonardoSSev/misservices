<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Phone extends Model
{
    public function users()
    {
        return $this->belongsToMany(\App\User::class);
    }

    public function phoneType()
    {
        return $this->belongsTo(\App\PhoneType::class, 'phone_type_id');
    }

    public function getPhone($idphone, $pagination){
        $result = DB::table('phones')
        ->select('phones.id', 'phones.ddd', 'phones.number', 'phone_types.name as phoneTypeName')
        ->join('phone_types', 'phones.phone_type_id', '=', 'phones.id')
        ->where('phones.id', 'like', '%'. $idphone . '%')
        ->paginate($pagination);

        return $result;
    }
}
