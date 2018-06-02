<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    public function getCategories($category, $pagination){
        $result = DB::table('categories')
        ->where('name', 'like', '%'. $category . '%')
        ->paginate($pagination);

        return $result;
    }
}
