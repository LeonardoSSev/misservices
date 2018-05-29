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
        $messages = DB::table('messages')
                        ->select('chat_id', 'sender_id', 'receiver_id', 'text', 'updated_at')
                        ->where('chat_id', '=', $chatId)
                        ->orderBy('messages.updated_at')
                        ->get();
        foreach ($messages as $message) {
            $message->receiverName = User::find($message->receiver_id)->name;
            $message->senderName = User::find($message->sender_id)->name;
            $message->updated_at = Helper::getFormatDateAndHour($message->updated_at);
        }

        return $messages;
    }

}