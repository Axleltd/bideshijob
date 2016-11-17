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
        $table->string('duties');        
        $table->float('salary');
        $table->float('cost');
        $table->float('overtime');
        $table->integer('quantity')->unsigned();
        $table->integer('duty_hours')->unsigned();
        $table->boolean('featured')->unsigned();
        $table->text('requirement');
        $table->integer('contact_id')->unsigned();
        $table->timestamps();        

        $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        $table->foreign('company_id')
                ->references('id')->on('companies')
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
        Schema::drop('jobs');
    }
}
