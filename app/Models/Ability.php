<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}
