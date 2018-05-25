<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProvidedServiceColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('provided_services', function (Blueprint $table) {
            $table->binary('isPaid')->after('price')->nullable();
            $table->binary('isRated')->after('isPaid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('provided_services', function (Blueprint $table) {
            //
        });
    }
}
