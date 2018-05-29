<?php

namespace App\Http\Controllers\Portal\User;

use App\Rate;
use App\Chat;
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

        $user = Auth()->user();

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

        return view('portal.user.profile.requests', compact(['user', 'servicesRequests', 'services', 'numServices']));
    }

    public function showCurrencyRequests()
    {
        $user = Auth()->user();
        $helper = new Helper();
        $servicesRequestsInProgress = $helper->getServices('IN PROGRESS');
        $servicesRequestsInProgressForProvider = $helper->getServices('IN PROGRESS', true);
        $servicesRequestsNotAnswered = $helper->getServices('OPENED');

        return view('portal.user.profile.currency_requests', compact(['user', 'servicesRequestsInProgress',
            'servicesRequestsNotAnswered', 'servicesRequestsInProgressForProvider']));
    }

    public function showServicesHistory()
    {
        $helper = new Helper();

        $user = Auth()->user();

        $ids = Helper::getUserHistory();

        $providedServices = $helper->getProvidedService($ids);

        return view('portal.user.profile.services_requested', compact(['user', 'providedServices']));
    }

    public function acceptServiceRequest(int $providedService_id)
    {
        $provided_service = ProvidedService::find($providedService_id);

        $provided_service->status = 'IN PROGRESS';
        $provided_service->save();

        $result = Chat::create(['provided_service_id' => $providedService_id]);

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
        $user = Auth()->user();

        $providedService = ProvidedService::find($providedServiceId);

        $rateDone = $this->verifyIfUserAlreadyRated($providedService->id);

        return view('portal.user.provided_services.finish', compact(['user', 'providedService', 'rateDone']));
    }

    private function verifyIfUserAlreadyRated($providedServiceId)
    {
        $rate = DB::table('rates')
                    ->select('user_id')
                    ->where([
                        ['provided_service_id', '=', $providedServiceId],
                        ['user_id', '<>', Auth()->user()->id]
                    ])
                    ->get();

        if (is_object($rate) && (isset($rate[0]))) {
            return true;
        }

        return false;
    }

    public function rateProvidedService(Request $request, $providedServiceId)
    {
        $providedService = ProvidedService::find($providedServiceId);

        $rate = new Rate();
        $rate->provided_service_id = $providedService->id;
        if (Auth()->user()->id === $providedService->client_id) {
            $rate->user_id = $providedService->provider_id;
            $providedService->isProviderRated = 1;
        } else {
            $rate->user_id = $providedService->client_id;
            $providedService->isClientRated = 1;
        }
        $rate->rate = $request['rate'];
        $rate->save();
        $providedService->save();

        $serviceDone = Helper::verifyIfServiceIsPaidAndRated($providedServiceId);

        if ($serviceDone) {
            return redirect()->route('user.current.services')->with(['status' => 'Serviço finalizado']);
        }

        return redirect()->route('user.finish.request', $providedService->id)->with(['status' => 'Avaliação 
        realizada.']);
    }

    public function payProvidedService(Request $request, $providedServiceId)
    {
        $providedService = ProvidedService::find($providedServiceId);

        if (!Helper::checkForPaidButNotRated($providedServiceId)) {

            return redirect()->route('user.finish.request', $providedServiceId)->with(['error' => 'É preciso que
            ambos usuários façam a avaliação do serviço']);
        }
        if (Auth()->user()->id === $providedService->client_id) {
            $providedService->isPaid = 0;
            $providedService->save();
            return redirect()->route('user.finish.request', $providedServiceId)->with(['status' => 'Serviço 
            declarado como pago. Aguarde a avaliação final do prestador de serviço']);
        }

        $providedService->isPaid = 1;
        $providedService->save();


        $serviceDone = Helper::verifyIfServiceIsPaidAndRated($providedServiceId);

        if ($serviceDone) {
            return redirect()->route('user.current.services')->with(['status' => 'Serviço finalizado']);
        }

        return redirect()->route('user.finish.request', $providedServiceId)->with(['status' => 'Serviço declarado 
        como pago. Aguarde a avaliação final do prestador de serviço']);
    }

    public function setProvidedServicePrice(Request $request, $providedServiceId)
    {
        $providedService = ProvidedService::find($providedServiceId);

        $providedService->price = $request['price'];

        $providedService->save();

        return redirect()->route('user.current.services')->with(['status' => 'Preço de serviço alterado.']);
    }
}
