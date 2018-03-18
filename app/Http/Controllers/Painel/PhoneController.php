<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Phone;
use App\User;
use App\PhoneType;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = Phone::all();

        return view('painel.phones.home', compact('phones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPhone(User $user)
    {
        $phone_types = PhoneType::all();
        $users = $user->getNoAdminUsers();

        return view('painel.phones.create', compact(['users', 'phone_types']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePhone(Request $request)
    {
        $phone = new Phone;

        $phone->number = $request['number'];
        $phone->phone_type_id = $request['phone_type'];

        $phone->save();
        $phone->users()->sync($request['user']);

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idPhone
     * @return \Illuminate\Http\Response
     */
    public function viewPhone($idPhone)
    {
        $phone = Phone::find($idPhone);

        return view('painel.phones.view', compact('phone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idPhone
     * @return \Illuminate\Http\Response
     */
    public function editPhone($idPhone, User $user)
    {
        $phone = Phone::find($idPhone);
        $phone_types = PhoneType::all();
        $users = $user->getNoAdminUsers();

        return view('painel.phones.edit', compact(['phone', 'phone_types', 'users']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idPhone
     * @return \Illuminate\Http\Response
     */
    public function updatePhone(Request $request, $idPhone)
    {
        $phone = Phone::find($idPhone);

        $phone->number = $request['number'];
        $phone->phone_type_id = $request['phone_type'];

        $phone->save();
        $phone->users()->sync($request['user']);

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idPhone
     * @return \Illuminate\Http\Response
     */
    public function deletePhone($idPhone)
    {
        Phone::destroy($idPhone);

        return redirect()->back();
    }
}
