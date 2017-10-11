<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProvidedService extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'comentario', 'valor', 'status', 'idCliente', 'idPrestador', 'idServico'
    ];


}