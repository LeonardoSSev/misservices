<?php

namespace App\Http\Controllers\Painel;

use App\Phone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PhoneType;

class PhoneTypesController extends Controller
{
    private $numberPagination = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theTypes = '';
        if( !empty($_GET["search-types"]) ){
            $theTypes = $_GET["search-types"];
        }

        $searchPhoneTypes = new PhoneType();
        $phoneTypes = $searchPhoneTypes->getPhoneType( $theTypes, $this->numberPagination );

        return view('painel.phoneTypes.home', compact('phoneTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPhoneType()
    {
        return view('painel.phoneTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePhoneType(Request $request)
    {
        $phone_type = new PhoneType;

        $phone_type->name = $request->name;
        $phone_type->description = $request->description;

        $phone_type->save();

        return redirect()->route('admin.phone_types')->with(['status' => 'O tipo de telefone foi criado com sucesso.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idPhoneType
     * @return \Illuminate\Http\Response
     */
    public function viewPhoneType($idPhoneType)
    {
        $phoneType = PhoneType::find($idPhoneType);

        return view('painel.phoneTypes.view', compact('phoneType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idPhoneType
     * @return \Illuminate\Http\Response
     */
    public function editPhoneType($idPhoneType)
    {
        $phoneType = PhoneType::find($idPhoneType);

        return view('painel.phoneTypes.edit', compact('phoneType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idPhoneType
     * @return \Illuminate\Http\Response
     */
    public function updatePhoneType(Request $request, $idPhoneType)
    {
        $phoneType = PhoneType::find($idPhoneType);

        $phoneType->name = $request->name;
        $phoneType->description = $request->description;

        $phoneType->save();

        return redirect()->route('admin.phone_types')->with(['status' => 'O tipo de telefone foi atualizado com sucesso.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idPhoneType
     * @return \Illuminate\Http\Response
     */
    public function deletePhoneType($idPhoneType)
    {
        PhoneType::destroy($idPhoneType);

        return redirect()->route('admin.phone_types')->with(['status' => 'O tipo de telefone foi excluído com sucesso.']);


    }
}
