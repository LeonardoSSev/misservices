<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    static $password;

    return [
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'cpf' => str_random(11),
        'uf' => 'SP',
        'cidade' => 'Praia Grande',
        'cep' => '00000000',
        'bairro' => 'Boqueirão',
        'endereco' => 'Rua do usuário, 10',
        'idUserType' => $faker->randomElement([2, 3])
    ];
});
