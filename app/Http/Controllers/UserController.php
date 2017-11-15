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
            print_r($this->user);
        } else {
            $this->user = null;
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cliente($idTipo){

        if($idTipo == 2){
            return view('user/index');
        }



    }

    public static function index()
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
            $user = $request->except('servico');
            $user['idUserType'] = (isset($user['idUserType']) == '' ) ? 2 : 3;
            $user['password'] = bcrypt($user['password']);
            $insert = User::create($user);
            
            if($insert){
                return view('acesse');
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
            
            $result = User::find($id);
            return view('sections.admin.edit', compact('result'));

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
        try {
            $user = $request->except(['telefone', 'servico']);

            $oldUser = User::find($id);

            $update = $oldUser->update($user);

            if ($update) {
                return redirect('/admin');
            } else {
                return response("Erro ao atualizar informações.", 200);
            }
        }catch(Exception $ex){
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
            $usuario = User::find($id);
            $usuario->delete();
            return redirect('/admin');
        } catch (Exception $ex){
            return response([
                "error" => true,
                "mensagem" => "Erro: ".$ex->getMessage()
                ], 500);
        }
    }

    public static function getAclByEmail($email){
        try{
            //echo $email;
            $id = 1;
            $user = User::where('email', $email)->first();

            //echo $user['idUserType'];
            return $user['idUserType'];
        } catch(Exception $ex){
            return response([
                "error" => true,
                "mensagem" => "Erro: ".$ex->getMessage()
            ], 500);
        }
    }
}
