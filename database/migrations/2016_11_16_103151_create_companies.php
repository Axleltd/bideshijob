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
        $table->string('logo')->nullable();
        $table->string('description');        
        $table->boolean('featured')->unsigned()->default(false);
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
