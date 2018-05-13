<?php

namespace App\Http\Controllers\Auth;

use App\Phone;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function redirectTo()
    {
        return '/';
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:250',
            'email' => 'required|string|email|max:250|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'cpf' => 'required|max:11|unique:users',
            'state' => 'required|max:2|string',
            'city' => 'string',
            'zipcode' => 'required|max:8',
            'neighbourhood' => 'string',
            'address' => 'string'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = new User;

        $user->name          = $data['name'];
        $user->email         = $data['email'];
        $user->password      = bcrypt($data['password']);
        $user->cpf           = $data['cpf'];
        $user->state         = $data['state'];
        $user->city          = $data['city'];
        $user->zipcode       = $data['zipcode'];
        $user->neighbourhood = $data['neighbourhood'];
        $user->address       = $data['address'];

        $user->save();

        if ($data['cellphone']) {
            $cellphone = new Phone;

            $cellphone->ddd           = substr($data['cellphone'], 0, 2);
            $cellphone->number        = $data['cellphone'];
            $cellphone->phone_type_id = 2;

            $cellphone->save();
            $cellphone->users()->sync($user->id);
        }
        if ($data['telephone']) {
            $telephone = new Phone;

            $cellphone->ddd           = substr($data['telephone'], 0, 2);
            $telephone->number        = $data['telephone'];
            $telephone->phone_type_id = 1;

            $telephone->save();
            $telephone->users()->sync($user->id);
        }

        return $user;
    }
}
