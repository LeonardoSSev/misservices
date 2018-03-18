<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PhoneTypeTableSeeder::class);
        $this->call(PhoneTableSeeder::class);



        //factory('App\User', 10)->create();
    }
}
