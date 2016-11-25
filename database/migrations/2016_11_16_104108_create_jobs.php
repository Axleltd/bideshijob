<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {            
        $table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->integer('company_id')->unsigned();
        $table->string('title');
        $table->string('categories');
        $table->string('about_job');
        $table->string('description');        
        $table->string('facilities');        
        $table->string('country');        
        $table->string('duties');        
        $table->float('salary');
        $table->float('cost');
        $table->float('overtime');
        $table->integer('quantity')->unsigned();
        $table->integer('duty_hours')->unsigned();
        $table->boolean('featured')->unsigned()->default(false);
        $table->text('requirement');
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
        Schema::drop('jobs');
    }
}
