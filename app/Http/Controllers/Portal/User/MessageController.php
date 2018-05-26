<?php

namespace App\Http\Controllers\Portal\User;

use App\ProvidedService;
use Illuminate\Http\Request;
use App\Message;
use App\Http\Controllers\Controller;
use App\Helper;


class MessageController extends Controller
{
    public function showUserMessages()
    {
        $userProvidedServices = Helper::getProvidedServicesChat();

        return view('portal.user.messages.messages', compact(['userProvidedServices']));
    }
}
