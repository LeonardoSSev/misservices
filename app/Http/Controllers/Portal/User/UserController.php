<?php

namespace App\Http\Controllers\Portal\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userProfile($id)
    {
        $user = User::find($id);

        return view('portal.user.profile.profile', compact('user'));
    }

    public function showUserRequests(int $userId)
    {

        return view('portal.user.profile.services');
    }

}
