<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            
            $service = new Service();
            $service = $request->all();
            
            $insert = User::create($service);
            
            if($insert){
                return response($user, 200);
                // return view('index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        $service = new Service();
        $service = $request->except('servico');
        $user['idUserType'] = (isset($user['idUserType']) == '' ) ? 2 : 3;
        $user['password'] = bcrypt($user['password']);
        $oldUser = User::find($id);

        $update = $oldUser->update($user);

        if($update){
                return response($user, 200);
            }else{
                return response("Erro ao atualizar informações.", 200);
            }

        return response();
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
            Service::query()->find($id)->delete();
            return response('Destroy', 200);
        } catch (Exception $ex){
            return response([
                "error" => true,
                "mensagem" => "Erro: ".$ex->getMessage()
                ], 500);
        }
    }
}
