<?php

namespace App\Http\Controllers\Portal\User;


use App\ProvidedService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chat;
use App\User;

class ChatController extends Controller
{
    public function showChat($providedServiceId)
    {
        $providedService = ProvidedService::find($providedServiceId);
        $chat = Chat::getMessages(Chat::where('provided_service_id', '=', $providedServiceId)->first()->id);
        $client = User::find($providedService->client_id);
        $provider = User::find($providedService->provider_id);


        return view('portal.user.messages.chat', compact(['chat', 'providedService']));
    }
}
