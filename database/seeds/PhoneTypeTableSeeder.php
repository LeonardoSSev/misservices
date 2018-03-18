<?php

use Illuminate\Database\Seeder;
use App\PhoneType;

class PhoneTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhoneType::create([
            'name' => 'Residencial',
            'description' => 'Telefone pessoal fixo.'
        ]);

        PhoneType::create([
            'name' => 'Celular',
            'description' => 'Telefone pessoal móvel.'
        ]);
    }
}
