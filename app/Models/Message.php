<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['sender_id', 'receiver_id', 'text'];

    public function chat()
    {
        return $this->belongsTo(\App\Chat::class);
    }
}
