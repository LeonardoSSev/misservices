<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
