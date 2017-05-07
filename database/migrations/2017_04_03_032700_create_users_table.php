<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->primary_key();
            $table->string('username');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            //Personal
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->dateTime('birthday')->nullable();
            //Contact
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->rememberToken();
                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
