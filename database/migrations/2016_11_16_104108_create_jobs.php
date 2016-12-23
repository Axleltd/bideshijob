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
        $table->string('slug')->unique();
        $table->string('title');
        $table->string('categories');
        $table->string('image')->nullable();
        $table->longtext('about_job')->nullable();
        $table->longtext('description')->nullable();        
        $table->longtext('facilities');        
        $table->string('country');        
        $table->longtext('duties')->nullable();        
        $table->string('salary');
        $table->string('cost')->nullable();
        $table->string('overtime');
        $table->integer('quantity')->unsigned();
        $table->integer('duty_hours')->unsigned()->default(0);
        $table->boolean('featured')->unsigned()->default(false);
        $table->longtext('requirement')->nullable();
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
