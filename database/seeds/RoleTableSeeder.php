<?php

use Illuminate\Database\Seeder;
use App\Role;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create([
           'name' => 'Admin',
           'description' => 'Do everything.'
        ]);

        Role::create([
            'name' => 'Client',
            'description' => 'Ask for services.'
        ]);

        Role::create([
            'name' => 'Provider',
            'description' => 'Provide services.'
        ]);


    }
}
