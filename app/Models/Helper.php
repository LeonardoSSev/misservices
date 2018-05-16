<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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


    private function getProvidedService($ids)
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

        $obj->providedServiceId = ProvidedService::find($data->id)->id;

        return $obj;
    }

    public static function getFormatDate($date)
    {
        $formatDate = new \DateTime($date);

        return$formatDate->format('d/m/Y');
    }
}
