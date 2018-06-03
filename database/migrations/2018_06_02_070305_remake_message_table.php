<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemakeMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('messages');
        Schema::table('messages', function (Blueprint $table) {
            Schema::create('messages', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('sender_id')->unsigned();
                $table->integer('receiver_id')->unsigned();
                $table->text('text');
                $table->softDeletes();
                $table->timestamps();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            //
        });
    }
}
