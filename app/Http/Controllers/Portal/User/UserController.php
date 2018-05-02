<?php

namespace App\Http\Controllers\Portal\User;

use App\ProvidedService;
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

    public function showServicesRequests()
    {
        $servicesRequests = DB::table('provided_services')
                                ->join('users', 'provided_services.client_id', '=', 'users.id')
                                ->join('services', 'provided_services.service_id', '=', 'services.id')
                                ->select('provided_services.id', 'services.name as serviceName',
                                    'users.name as userName', 'provided_services.created_at as date')
                                ->where([['provider_id', '=', \Auth::user()->id], ['status', '=', 'OPENED']])
                                ->get();

        return view('portal.user.profile.requests', compact('servicesRequests'));
    }

    public function acceptServiceRequest(int $providedService_id)
    {
        $provided_service = ProvidedService::find($providedService_id);

        $provided_service->status = 'PROGRESS';
        $provided_service->save();

        return redirect()->route('user.requests')->with('status', 'O serviço foi aceito!');
    }

    public function refuseServiceRequest(int $providedService_id)
    {
        $provided_service = ProvidedService::find($providedService_id);

        $provided_service->status = 'REFUSED';
        $provided_service->save();

        return redirect()->route('user.requests')->with('status', 'O serviço foi recusado!');

    }

}
