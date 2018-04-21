<?php

namespace App\Http\Controllers\Portal\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function userProfile($id)
    {
        $user = User::find($id);

        return view('user.profile', compact('user'));
    }

}
