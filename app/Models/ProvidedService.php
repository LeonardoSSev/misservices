<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvidedService extends Model
{
    public function provider() {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function client() {
        return $this->belongsTo(User::class, 'client_id');
    }

}
