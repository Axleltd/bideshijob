<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersActivation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_activation', function (Blueprint $table) {            
        $table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->string('token')->index();
        $table->timestamp('created_at');
        $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_activation');
    }
}
