<?php

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('users')->insert([
            'username' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => str_random(10),
        ]);
		 
    }
}
