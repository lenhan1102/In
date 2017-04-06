<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
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
    		DB::table('images')->insert([
    			'dish_id' => $i +1,
    			'link' => '13 Bun_cha.jpg'
    			]);
    	}
    }
}
