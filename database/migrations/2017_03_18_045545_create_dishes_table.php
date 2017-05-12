<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('menu_id');
            $table->string('name');
            $table->integer('price');
            $table->string('avatar')->default('default.png');
            //Info
            $table->integer('ordered')->nullable();
            $table->float('rating', 3, 2)->default(0);
            $table->string('description')->nullable();
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dishes');
    }
}
