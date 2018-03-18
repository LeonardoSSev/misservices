<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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



}
