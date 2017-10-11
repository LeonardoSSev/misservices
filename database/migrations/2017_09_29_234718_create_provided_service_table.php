<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidedServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provided_service', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comentario');
            $table->float('valor');
            $table->boolean('status');
            $table->integer('idCliente');
            $table->integer('idPrestador');
            $table->integer('idServico');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provided_service');
    }
}
