<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;

class Helper extends Model
{

    public function numberGenerator($maxLength):string
    {
        return substr(str_shuffle('12345678901'),0, $maxLength);
    }


    public function phoneGenerator($type):string
    {

        if ($type === 'cellphone') {
            $phone = $this->numberGenerator(9);
            $phone = substr_replace($phone, '9', 0, 1);
            $phone = preg_replace("/([0-9]{5})/", "$1-$2", $phone);
        } else {
            $phone = $this->numberGenerator(8);
            $phone = preg_replace("/([0-9]{4})/", "$1-$2", $phone);
            $phone = substr($phone, 0, -1);
        }

        return $phone;
    }


    public function getServices(string $providedServiceStatus, $isProvider = null)
    {
        if ($isProvider === true) {
            $where = [['provider_id', '=', Auth()->user()->id], ['status', '=', $providedServiceStatus]];
        } else {
            $where = [['client_id', '=', Auth()->user()->id], ['status', '=', $providedServiceStatus]];
        }

        $ids = DB::table('provided_services')
            ->select('id', 'client_id', 'provider_id', 'service_id')
            ->where($where)
            ->get();

        $providedServices = $this->getProvidedService($ids);

        return $providedServices;
    }


    public function getProvidedService($ids)
    {
        $servicesReturn = [];

        foreach ($ids as $id) {
            $servicesReturn[] = $this->setProvidedService($id);
        }


        return $servicesReturn;
    }

    private function setProvidedService($data)
    {
        $obj = new \stdClass();

        $obj->clientName = User::find($data->client_id)->name;

        $obj->providerName = User::find($data->provider_id)->name;

        $obj->serviceName = Service::find($data->service_id)->name;

        $providedService = ProvidedService::find($data->id);

        $obj->providedServiceId = $providedService->id;
        $obj->providedServicePrice = $providedService->price;
        $obj->providedServiceStatus = $this->setStatus($providedService->status);
        $obj->providedServiceCreatedAt = self::getFormatDate($providedService->created_at);
        $obj->providedServiceUpdatedAt = self::getFormatDate($providedService->updated_at);

        return $obj;
    }

    private function setStatus(string $status)
    {
        if ($status === 'IN PROGRESS') {
            return "Em Progresso";
        } elseif ($status === 'PAID') {
            return "Pago";
        } elseif ($status === 'RATING REMAIN') {
            return "A espera de avaliação";
        } elseif ($status === 'CANCELLED') {
            return "Cancelado";
        } elseif ($status === 'DONE') {
            return "Finalizado";
        } elseif ($status === 'OPENED') {
            return "A espera de resposta";
        } elseif ($status === 'REFUSED') {
            return "Recusado";
        }

    }

    public static function getFormatDate($date)
    {
        $formatDate = new \DateTime($date);

        return $formatDate->format('d/m/Y');
    }

    public static function getContactEmailData(string $subject)
    {
        $emailData = [];

        if ($subject === 'Categoria inexistente') {
            $emailData['message'] = "Meu serviço não se enquadra em nenhuma das categorias disponíveis na plataforma.\nO meu serviço é [informe o seu serviço] e está relacionado a [informe a categoria que acredita que seja relativa ao seu tipo de serviço].";
        }

        return $emailData;
    }

    public static function verifyIfServiceIsPaidAndRated($providedServiceId)
    {
        $providedService = ProvidedService::find($providedServiceId);

        $isPaid = $providedService->isPaid;
        $isClientRated = $providedService->isClientRated;
        $isProviderRated = $providedService->isProviderRated;

        if ($isPaid == 1 && $isClientRated == 1 && $isProviderRated ==1) {
            $providedService->status = "DONE";
            $providedService->done_at = date("Y-m-d H:i:s");
            $providedService->save();
            return true;
        }

        return false;
    }


    public static function checkForEmptyProvidedServicePrice($providedServiceId)
    {
        $providedService = ProvidedService::find($providedServiceId);

        if ($providedService->price === null) {
            return false;
        }

        return true;
    }

    public static function getUserHistory($isProvider = null)
    {
        return DB::table('provided_services')
            ->select('id', 'client_id', 'provider_id', 'service_id')
            ->where([['client_id', '=', Auth()->user()->id], ['status', '<>', 'OPENED']])
            ->orWhere([['provider_id', '=', Auth()->user()->id], ['status', '<>', 'OPENED']])
            ->orderByDesc('status')
            ->get();
    }
}
