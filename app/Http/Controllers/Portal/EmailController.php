<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Request as GRequest;
use GuzzleHttp\Client as GuzzleClient;
use App\HttpRequest;
use Illuminate\Http\Request;

class EmailController extends Controller
{

    public function sendEmail(Request $request)
    {

        $message = $request->message;
        $name = $request->name;
        $email = $request->email;

        $request = new HttpRequest();

        $body = '{"sender":{"name":"'.$name.'","email":"'.$email.'"},"to":[{"email":"misserviceswebapp@gmail.com","name":"MisServices"}],"bcc":[{"email":"jonatasfeijolopes@gmail.com","name":"Jonatas"}, {"email": "leonardossev@gmail.com", "name": "Leonardo"}, {"name": "MisServices", "email": "misserviceswebapp@gmail.com"}],"htmlContent":"'.$message.'","textContent":"'.$message.'","subject":"MisServices - Usuário","replyTo":{"email":"misservicsewebapp@gmail.com","name":"MisServices"},"tags":["MisServices"]}';

        $request->addHeader('Accept', 'application/json');
        $request->addHeader('Content-Type', 'application/json');
        $request->addHeader('api-key', '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');
        $request->setBody($body);

        $req = new GRequest('POST', 'https://api.sendinblue.com/v3/smtp/email', ['Accept' => 'application/json', 'Content-Type' => 'application/json', 'api-key' => env('SENDINBLUE_KEY')], $request->getBody());

        $client = new GuzzleClient();
        $client->send($req);

        return redirect()->route('contact')->with(['status' => 'Sua mensagem foi enviada com sucesso. Iremos lhe retornar através do e-mail informado.']);
    }
}
