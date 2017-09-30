<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 250)->nullable();
            $table->string('email', 250)->unique()->nullable();
            $table->char('cpf', 11)->unique()->nullable();
            $table->char('uf', 2)->nullable();
            $table->string('cidade', 50)->nullable();
            $table->char('cep', 8)->nullable();
            $table->string('bairro', 250)->nullable();
            $table->string('endereco', 250)->nullable();
            $table->int('idAcl')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
