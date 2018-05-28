<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['provided_service_id'];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
