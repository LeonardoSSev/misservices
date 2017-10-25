<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{

    public function __construct(){
        if(JWTAuth::getToken()){
            $this->user = JWTAuth::parseToken()->authenticate();
        } else{
            $this->user = null;
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return response(User::all(), 200);
        } catch (Exception $ex){
            return response([
                "error" => true,
                "mensagem" => "Erro: ".$ex->getMessage()
                ], 500);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            return response('Create', 200);
        } catch (Exception $ex){
            return response([
                "error" => true,
                "mensagem" => "Erro: ".$ex->getMessage()
                ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $user = new User();
            $user = $request->except('servico');
            $user['idUserType'] = (isset($user['idUserType']) == '' ) ? 2 : 3;
            $user['password'] = bcrypt($user['password']);
            $insert = User::create($user);

            if($insert){
                return response($user, 200);
            }else{
                return response("Erro ao cadastrar", 200);
            }

        } catch (Exception $ex){
            return response([
                "error" => true,
                "mensagem" => "Erro: ".$ex->getMessage()
                ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         try{
            
            //return User::find($id)->phone;


             return response('Show', 200);
        } catch (Exception $ex){
            return response([
                "error" => true,
                "mensagem" => "Erro: ".$ex->getMessage()
                ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            
            return response('Edit', 200);
        } catch (Exception $ex){
            return response([
                "error" => true,
                "mensagem" => "Erro: ".$ex->getMessage()
                ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

        $user = new User();
        $user = $request->except('servico');
        $user['idUserType'] = (isset($user['idUserType']) == '' ) ? 2 : 3;
        $user['password'] = bcrypt($user['password']);
        $oldUser = User::find($id);

        $update = $oldUser->update($user);

        if($update){
                return response($user, 200);
            }else{
                return response("Erro ao atualizar informações.", 200);
            }

        return response()
        } catch (Exception $ex){
            return response([
                "error" => true,
                "mensagem" => "Erro: ".$ex->getMessage()
                ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            User::query()->find($id)->delete();
            return response('Destroy', 200);
        } catch (Exception $ex){
            return response([
                "error" => true,
                "mensagem" => "Erro: ".$ex->getMessage()
                ], 500);
        }
    }
}
