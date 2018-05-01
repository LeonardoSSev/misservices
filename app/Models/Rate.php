<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public function providedSerice() {
        return $this->belongsTo(ProvidedService::class, 'provided_service_id');
    }
}
