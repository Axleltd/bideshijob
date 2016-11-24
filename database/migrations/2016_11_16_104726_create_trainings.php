<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {            
            $table->increments('id');        
            $table->integer('company_id')->unsigned();        
            $table->string('title');
            $table->text('description');
            $table->string('categories');            
            $table->string('country');            
            $table->date('from');            
            $table->date('to');
            $table->float('fees');
            $table->integer('quantity')->unsigned()->default(0);
            $table->boolean('featured')->unsigned()->default(false);        
            $table->timestamps();   
            
            $table->foreign('company_id')
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
        Schema::drop('trainings');
    }
}
