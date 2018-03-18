<?php

namespace App\Http\Controllers\Painel;

use App\Phone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PhoneType;

class PhoneTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phoneTypes = PhoneType::all();

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

        return redirect('/admin/');
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

        return redirect('/admin/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idPhoneType
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPhoneType)
    {
        //
    }
}
