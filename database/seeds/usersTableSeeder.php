<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$role_admin = Role::where('name', 'User')->first();
        $role_user = Role::where('name', 'Admin')->first();

		$user = new User();
        $user->username = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('admin');
        $user->save();
        $user->roles()->attach($role_admin);*/
/*
        $user = new User();
        $user->username = 'Andy';
        $user->email = 'user@example.com';
        $user->password = bcrypt('user');
        $user->save();
        $user->roles()->attach($role_user);*/
    }
}
