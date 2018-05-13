<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidedServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provided_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provider_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->string('status')->default('OPENED');
            $table->float('price', 8, 2);
            $table->foreign('provider_id')
                ->references('id')
                ->on('users');
            $table->foreign('service_id')
                ->references('id')
                ->on('services');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
            $table->foreign('client_id')
                ->references('id')
                ->on('categories');
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
        Schema::dropIfExists('provided_services');
    }
}
