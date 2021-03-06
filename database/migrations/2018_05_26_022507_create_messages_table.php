<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender_id')->unsigned();
            $table->integer('receiver_id')->unsigned();
            $table->text('text');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('sender_id')
                    ->references('id')
                    ->on('users');

            $table->foreign('receiver_id')
                    ->references('id')
                    ->on('users');
        });

        Schema::create('chat_message', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chat_id')->unsigned();
            $table->integer('message_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('chat_id')
                    ->references('id')
                    ->on('chats');

            $table->foreign('message_id')
                    ->references('id')
                    ->on('messages');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
