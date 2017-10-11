<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;


    protected $fillable = [
        'nome', 'email', 'password', 'cpf', 'uf', 'cidade', 'cep', 'bairro', 'endereco', 'idUserType'
    ];

}
