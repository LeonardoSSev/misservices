<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function job(){
        return $this->belongsToMany(Category::class);
    }
}
