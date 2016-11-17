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
            $table->string('facebook');
            $table->string('twitter');         
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
        Schema::drop('all_social_medias');
    }
}
