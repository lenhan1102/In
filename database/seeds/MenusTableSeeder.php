<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$menu_names = array('Đồ ăn', 'Đồ uống', 'Bánh', 'Trái cây', 'Đặc sản', 'Rượu bia');
    	for ($i=0; $i < count($menu_names) ; $i++) { 
    	 	# code...
    		DB::table('menus')->insert([
    			'name' => $menu_names[$i],  
    		]);
    	}
    }
}
