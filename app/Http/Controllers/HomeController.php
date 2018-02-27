<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Service $service)
    {

        $services = $service->where('user_id', auth()->user()->id)->get();

        return view('home', compact('services'));
    }

    public function updateJob($idJob){
        $job =  Service::find($idJob);


        if ( Gate::denies('service-update', $job) )
              abort(403, 'Unauthorized');

        return view('update', compact('job'));
    }

}
