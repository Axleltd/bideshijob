<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllSocialMedias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('all_social_medias', function (Blueprint $table) {            
            $table->increments('id');
            $table->integer('contact_id')->unsigned();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();         
            $table->timestamps();

            $table->foreign('contact_id')
                ->references('id')->on('contacts')
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
        Schema::drop('all_social_medias');
    }
}
