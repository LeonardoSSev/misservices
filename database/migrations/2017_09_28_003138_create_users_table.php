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
            $table->string('nome', 250);
            $table->string('email', 250)->unique();
            $table->string('password', 250);
            $table->char('cpf', 11)->unique();
            $table->char('uf', 2);
            $table->string('cidade', 50);
            $table->char('cep', 8);
            $table->string('bairro', 250);
            $table->string('endereco', 250);
            $table->integer('idUserType');
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
