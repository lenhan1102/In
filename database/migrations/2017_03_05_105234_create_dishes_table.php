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
        //
		/*
		Schema::create('dishes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('list_id');
			$table->string('name');
			$table->integer('price');
			
			//Info
			$table->integer('ordered')->nullable();
			$table->integer('rate')->nullable();
			$table->string('description')->nullable();
          
            $table->timestamps();
		
        });
		*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		//Schema::drop('dishes');
    }
}
