<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->nome = 'Administrador';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('123');
        $user->cpf = '11122233345';
        $user->uf = 'SP';
        $user->cidade = 'Praia Grande';
        $user->cep = '12345678';
        $user->bairro = 'Boqueirão';
        $user->endereco = 'Rua do administrador, 5';
        $user->idUserType = 1;
        $user->save();
    }
}
