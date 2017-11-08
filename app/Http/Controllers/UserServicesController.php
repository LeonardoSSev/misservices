<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserServicesController extends Controller
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
    public function store($idUser, $idService)
    {

        try{
            $providedService = new ProvidedService();

            $providedService = array($idUser, $idService);

            $insert = ProvidedService::create($providedService);
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
        //
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
            ProvidedService::query()->find($id)->delete();
            return response('Destroy', 200);
        } catch (Exception $ex){
            return response([
                "error" => true,
                "mensagem" => "Erro: ".$ex->getMessage()
                ], 500);
        }
    }
}
