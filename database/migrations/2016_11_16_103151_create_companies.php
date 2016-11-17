<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {            
        $table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->string('name');
        $table->string('logo');
        $table->string('description');        
        $table->integer('featured')->unsigned();
        $table->integer('contact_id')->unsigned();
        
        $table->timestamps();   

        $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');    
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
        Schema::drop('companies');
    }
}
