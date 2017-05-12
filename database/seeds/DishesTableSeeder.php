<?php

use Illuminate\Database\Seeder;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	for ($i=0; $i < 100 ; $i++) { 
        	# code...
    		DB::table('dishes')->insert([
    			'menu_id' => rand(1, 6),
    			'name' => str_random(10),
    			'price' => rand(20, 500)*1000,
                

    			'rating' => rand(1, 5),
    			'ordered' => rand(3, 1000),
    			'description' => str_random(25),
    			]);
    	}
    }
}
