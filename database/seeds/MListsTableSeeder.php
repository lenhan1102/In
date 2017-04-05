<?php

use Illuminate\Database\Seeder;

class MListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$Doan = array('Ăn vặt & Ăn nhẹ', 'Mì Bún Phở Cháo', 'Pizza & Hamburger', 'Cơm gà & Cơm tấm', 'Thịt nướng & quay', 'Sushi & Sashimi', 'Món chay', 'Cơm văn phòng', 'Lẩu Hải sản', 'Bánh mì & Xôi', 'Thức ăn nhanh', 'Bún Chả Hà Nội', 'Bún Đậu Mắm Tôm', 'Gà Vịt Heo', 'Cơm gia đình', 'Mì Cay Hàn Quốc', 'Cháo ếch', 'Bánh Canh Cua Ghẹ', 'Hủ Tiếu Nam Vang', 'Súp Cua');
    	for ($i=0; $i < count($Doan); $i++) { 
    		# code...
    		DB::table('mlists')->insert([
    			'menu_id' => 1,
    			'name' => $Doan[$i]   
    			]);
    	}
    	$Douong = array('Cà phê', 'Nước ép & Sinh tố', 'Trà sữa', 'Món chè', 'Kem', 'Nước ngọt');
    	for ($i=0; $i < count($Douong); $i++) { 
    		# code...
    		DB::table('mlists')->insert([
    			'menu_id' => 2,
    			'name' => $Douong[$i]   
    			]);
    	}
    	$Banh = array('Bánh tráng trộn', 'Bánh trung thu', 'Rau câu & flan', 'Bánh sinh nhật', 'Bánh ngọt', 'Tráng miệng', 'Bánh mặn', 'Bánh bông lan');
    	for ($i=0; $i < count($Banh); $i++) { 
    		# code...
    		DB::table('mlists')->insert([
    			'menu_id' => 3,
    			'name' => $Banh[$i]  
    		]);
    	}
    	$Traicay = array('Trái cây sạch', 'Rau sạch');
    	for ($i=0; $i < count($Traicay); $i++) { 
    		# code...
    		DB::table('mlists')->insert([
    			'menu_id' => 4,
    			'name' => $Traicay[$i]   
    		]);
    	}
    	$Dacsan = array('Đặc sản miền', 'Đặc sản Tết');
    	for ($i=0; $i < count($Dacsan); $i++) { 
    		# code...
    		DB::table('mlists')->insert([
    			'menu_id' => 5,
    			'name' => $Dacsan[$i]   
    		]);
    	}
    	$Ruoubia = array('Bia', 'Rượu vang');
    	for ($i=0; $i < count($Ruoubia); $i++) { 
    		# code...
    		DB::table('mlists')->insert([
    			'menu_id' => 6,
    			'name' => $Ruoubia[$i]   
    		]);
    	}

    }
}
