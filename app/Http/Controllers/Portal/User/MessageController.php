<?php

namespace App\Http\Controllers\Portal\User;

use App\ProvidedService;
use App\Chat;
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

    public function sendMessage(Request $request, $providedServiceId)
    {
        $providedService = ProvidedService::find($providedServiceId);
        $chat = Chat::where('provided_service_id', '=', $providedServiceId)->first();

        $message = new Message();

        $message->sender_id = Auth()->user()->id;

        if ($providedService->client_id === Auth()->user()->id) {
            $message->receiver_id = $providedService->provider_id;
        } else {
            $message->receiver_id = $providedService->client_id;
        }

        $message->text = $request->message;
        $message->chat_id = $chat->id;
        $message->save();


        return redirect()->route('user.messages')->with(['status' => 'Mensagem enviada com sucesso.']);

    }
}
