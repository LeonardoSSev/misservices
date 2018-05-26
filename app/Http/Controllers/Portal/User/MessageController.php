<?php

namespace App\Http\Controllers\Portal\User;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function showUserMessages()
    {
        return view('portal.user.messages');
    }
}
