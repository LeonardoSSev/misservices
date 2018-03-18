<?php

use Illuminate\Database\Seeder;
use App\Phone;
use App\Helper;

class PhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createPhoneNumberForAdmin();

        for ($i = 2;$i <= 11; $i++) {
            $this->createPhoneNumberForClients('cellphone', $i);
            $this->createPhoneNumberForClients('phone', $i);
        }
    }

    private function createPhoneNumberForAdmin()
    {
        $phone = new Phone;
        $phone->ddd = '11';
        $phone->number = '97610-9834';
        $phone->phone_type_id = 2;

        $phone->save();
        $phone->users()->sync(1);
    }

    private function createPhoneNumberForClients($type, $idFor)
    {
        $phone = new Phone;
        $helper = new Helper;

        $phone->ddd = '13';
        $phone->number = $helper->phoneGenerator($type);
        $phone->phone_type_id = $type === 'cellphone' ? 2 : 1;

        $phone->save();
        $phone->users()->sync($idFor);

    }
}
