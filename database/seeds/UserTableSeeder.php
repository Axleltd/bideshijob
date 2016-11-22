<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create(array(
          'name'=>'admin',
          'username'=>'admin',
          'email' => 'admin@admin.com',
          'password' => 'password',            
          'email_activated' => true,      
    ));
    }
}
