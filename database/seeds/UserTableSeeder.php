<?php

use Illuminate\Database\Seeder;
use App\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdminUser();

        for ($i = 1;$i < 11; $i++) {
            $this->createClientUser($i);
        }
    }

    private function createAdminUser()
    {
        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@misservices.com';
        $user->password = bcrypt('123456');
        $user->cpf = '00000000000';
        $user->state = 'SP';
        $user->city = 'Praia Grande';
        $user->zipcode = '11700100';
        $user->neighbourhood = 'Boqueirão';
        $user->address = 'Praça 19 de Janeiro';

        $user->save();
        $user->roles()->sync(1);
    }

    private function createClientUser($relativeNumber)
    {
        $user = new User;
        $user->name = 'Cliente '.$relativeNumber;
        $user->email = 'client'.$relativeNumber.'@misservices.com';
        $user->password = bcrypt('123456');
        $user->cpf = $this->simpleNumberGenerator();
        $user->state = 'SP';
        $user->city = 'Praia Grande';
        $user->zipcode = '11700100';
        $user->neighbourhood = 'Boqueirão';
        $user->address = 'Praça 19 de Janeiro';

        $user->save();
        $user->roles()->sync(2);
    }

    private function simpleNumberGenerator()
    {
        return str_shuffle('12345678901');
    }

}
