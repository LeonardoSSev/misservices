<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Request as Request;
use GuzzleHttp\Client as GuzzleClient;
use App\HttpRequest;

class EmailController extends Controller
{

    public function sendEmail()
    {

        $request = new HttpRequest();
        $body = '{"sender":{"name":"MisServices","email":"misserviceswebapp@gmail.com"},"to":[{"email":"leonardossev@gmail.com","name":"Testando"}],"bcc":[{"email":"jonatasfeijolopes@gmail.com","name":"Jonatas"}],"htmlContent":"Meu serviço não se enquadra em nenhuma das categorias disponíveis na plataforma.\\\\r\\\\n O meu serviço é [informe o seu serviço] e está relacionado a [informe a categoria que acredita que seja relativa ao seu tipo de serviço].","textContent":"Meu serviço não se enquadra em nenhuma das categorias disponíveis na plataforma.\\\\r\\\\n O meu serviço é [informe o seu serviço] e está relacionado a [informe a categoria que acredita que seja relativa ao seu tipo de serviço].","subject":"Testando API SendinBlue","replyTo":{"email":"misservicsewebapp@gmail.com","name":"MisServices"},"tags":["Categoria"]}';
        $request->addHeader('Accept', 'application/json');
        $request->addHeader('Content-Type', 'application/json');
        $request->addHeader('api-key', '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');
        $request->setBody($body);

        $req = new Request('POST', 'https://api.sendinblue.com/v3/smtp/email', $request->getHeaders(), $request->getBody());
        dd($req);
        $client = new GuzzleClient();

        dd($client->send($req));
    }
}
