<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Phone;
use App\User;
use App\PhoneType;

class PhoneController extends Controller
{
    private $numberPagination = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thePhones = '';
        if( !empty($_GET["search-phones"]) ){
            $thePhones = $_GET["search-phones"];
        }

        $searchPhones = new Phone();
        $phones = $searchPhones->getPhone( $thePhones, $this->numberPagination );

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

        return redirect()->route('admin.phones')->with(['status' => 'O telefone foi criado com sucesso.']);
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

        $phone->ddd = $request->ddd;
        $phone->number = $request->number;
        $phone->phone_type_id = $request['phone_type'];

        $phone->save();
        $phone->users()->sync($request['user']);

        return redirect()->route('admin.phones')->with(['status' => 'O telefone foi atualizado com sucesso.']);
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

        return redirect()->route('admin.phones')->with(['status' => 'O telefone foi excluído com sucesso.']);
    }

    /**
     * Show the users that are associated with this resource.
     *
     * @param  int  $idPhone
     */
    public function usersPhone($idPhone)
    {

        $phone = Phone::find($idPhone);

        $users = $phone->users()->get();

        return view('painel.phones.users', compact(['phone', 'users']));
    }
}
