<?php

namespace App\Http\Controllers\Portal\User;

use Illuminate\Http\Request;
use App\ProvidedService;
use App\Service;
use App\Helper;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class ProvidedServiceController extends Controller
{
    public function showServicesRequests()
    {
        $servicesRequests = DB::table('provided_services')
            ->join('users', 'provided_services.client_id', '=', 'users.id')
            ->join('services', 'provided_services.service_id', '=', 'services.id')
            ->select('provided_services.id', 'services.name as serviceName',
                'users.name as userName', 'provided_services.created_at as date')
            ->where([['provider_id', '=', \Auth::user()->id], ['status', '=', 'OPENED']])
            ->get();

        foreach ($servicesRequests as $services) {
            $services->date = Helper::getFormatDate($services->date);
        }

        $services = DB::table('services')
            ->select('*')
            ->where('user_id', '=', Auth()->user()->id)
            ->get();

        $numServices = Service::where('user_id', Auth()->user()->id)->count();

        return view('portal.user.profile.requests', compact(['servicesRequests', 'services', 'numServices']));
    }

    public function showCurrencyRequests()
    {
        $helper = new Helper();
        $servicesRequestsInProgress = $helper->getServices('IN PROGRESS');
        $servicesRequestsInProgressForProvider = $helper->getServices('IN PROGRESS', true);
        $servicesRequestsNotAnswered = $helper->getServices('OPENED');

        return view('portal.user.profile.currency_requests', compact(['servicesRequestsInProgress', 'servicesRequestsNotAnswered', 'servicesRequestsInProgressForProvider']));
    }

    public function showServicesHistory()
    {
        $helper = new Helper();

        $ids = DB::table('provided_services')
            ->select('id', 'client_id', 'provider_id', 'service_id')
            ->where([['client_id', '=', Auth()->user()->id], ['status', '=', 'CANCELLED']])
            ->orWhere([['provider_id', '=', Auth()->user()->id], ['status', '=', 'PAID']])
            ->orWhere('status', '=', 'CLOSED')
            ->get();

        $providedServices = $helper->getProvidedService($ids);

        return view('portal.user.profile.services_requested', compact('providedServices'));
    }

    public function acceptServiceRequest(int $providedService_id)
    {
        $provided_service = ProvidedService::find($providedService_id);

        $provided_service->status = 'IN PROGRESS';
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

    public function cancelRequest($providedServiceId)
    {
        $providedService = ProvidedService::find($providedServiceId);

        $providedService->status = 'CANCELED';

        $providedService->save();

        return redirect()->route('user.current.services')->with('errors', 'Solicitação cancelada');
    }

    public function finishRequest($providedServiceId)
    {
        $providedService = ProvidedService::find($providedServiceId);

        return view('portal.user.provided_services.finish', compact(['providedService']));
    }

}
