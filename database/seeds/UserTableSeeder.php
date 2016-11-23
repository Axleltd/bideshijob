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
            DB::table('users')
                ->insert([
                    'name'     => 'admin',
                    'username' => 'administrator',
                    'email'    => 'admin@admin.com',
                    'password' => bcrypt('password'),
                    'email_activated' => true,                    
                ]
            );

           
    }
}
