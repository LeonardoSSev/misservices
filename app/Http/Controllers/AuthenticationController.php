<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class AuthenticationController extends Controller
{
     public function check_login(Request $request)
    {
    	$credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                //return response(trans('auth.failed'),401);
                $erro = "Dados incorretos";
                return view('acesse', compact('erro'));
            }
        } catch (JWTException $e) {
            return response(trans('auth.could_not_create_token'),500);
        }


        $usuarioTipo = UserController::getAclByEmail($request->get('email'));

        if($usuarioTipo == 1){
            return redirect('admin');
        }else if($usuarioTipo == 2){
            return redirect('user/'.$usuarioTipo);
        }



    }

    public function refresh_token(Request $request)
    {
        $token = JWTAuth::getToken();

        if (!$token) {
            return response()->json([
                'error' => true,
                'message' => ['Token não encontrado']
            ], 400);
        }

        if ($token->get()[0] == ':' && $token->get()[1] == ' ') {
            $token = substr($token->get(), 2);
        }

        try {
            $token = JWTAuth::refresh($token);
        } catch (TokenInvalidException $e) {
            return response()->json([
                'error' => true,
                'message' => [trans('auth.access_denied')]
            ], 401.3);
        }

        return response(compact('token'),200);
    }
}
