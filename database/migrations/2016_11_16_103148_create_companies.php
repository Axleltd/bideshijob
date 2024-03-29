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
        $table->string('slug')->unique();
        $table->string('logo')->nullable();
        $table->longtext('description');     
        $table->boolean('status')->default(false);     
        $table->boolean('featured')->default(false);
        
        $table->timestamps();

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
        Schema::drop('companies');
    }
}
