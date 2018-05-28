<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chat extends Model
{
    protected $fillable = ['provided_service_id'];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public static function getMessages($chatId)
    {
        return DB::table('messages')
                        ->join('chat_message', 'chat_message.message_id', '=', 'messages.id')
                        ->select('chat_message.chat_id', 'sender_id', 'receiver_id', 'text')
                        ->where('chat_message.chat_id', '=', $chatId)
                        ->orderBy('messages.updated_at')
                        ->get();
    }

}