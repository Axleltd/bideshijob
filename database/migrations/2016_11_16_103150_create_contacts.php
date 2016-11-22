<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {            
            $table->increments('id');        
            $table->string('email');
            $table->string('address');
            $table->string('website_link')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->morphs('contactable');            
            $table->timestamps();

            $table->foreign('contactable_id')
                ->references('id')->on('companies')
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
        Schema::drop('contacts');
    }
}
