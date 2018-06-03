<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Request as GRequest;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Http\Request;
use App\Email;
use App\User;

class EmailController extends Controller
{

    public function sendEmail(Request $request)
    {
        $email = new Email();

        $message = $request->message;
        $name = $request->name;
        $userEmail = $request->email;



        $message = trim(preg_replace('/\s\s+/', ' ', $request->message));
        $body = '{"sender":{"name":"'.$name.'","email":"'.$userEmail.'"},"to":[{"email":"misserviceswebapp@gmail.com","name":"MisServices"}],"bcc":[{"email":"jonatasfeijolopes@gmail.com","name":"Jonatas"}, {"email": "leonardossev@gmail.com", "name": "Leonardo"}, {"name": "MisServices", "email": "misserviceswebapp@gmail.com"}],"htmlContent":"'.$message.'","textContent":"'.$message.'","subject":"MisServices - Usuário","replyTo":{"email":"misservicsewebapp@gmail.com","name":"MisServices"},"tags":["MisServices"]}';

        $req = new GRequest('POST', 'https://api.sendinblue.com/v3/smtp/email', ['Accept' => 'application/json', 'Content-Type' => 'application/json', 'api-key' => env('SENDINBLUE_KEY')], $body);

        $client = new GuzzleClient();


        $email->message = $message;

        if ($user = User::where('email', '=', $userEmail)->first()) {
            $email->user_id = $user->id;
        } else {
            $email->user_id = 0;
        }
        $email->save();

        $client->send($req);

        return redirect()->route('contact')->with(['status' => 'Sua mensagem foi enviada com sucesso. Iremos lhe retornar através do e-mail informado.']);
    }
}
