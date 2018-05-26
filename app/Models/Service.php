<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    private $numberPagination = 10;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getServiceByName( $name ){
        $result = DB::table('categories')
                    ->join('services', 'services.category_id', '=', 'categories.id')
                    ->join('users', 'services.user_id', '=', 'users.id')
                    ->select('services.id', 'services.name', 'services.description', 'users.id as user_id',
                        'users.name as user_name')
                    ->where([['services.name', 'like', '%'.$name.'%'], ['users.id', '<>', \Auth::user()->id]])
                    ->paginate($this->numberPagination);
        
        return $result;
    }
}
