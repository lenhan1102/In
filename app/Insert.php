<?php

namespace App;


class Insert
{
	protected $name = ['Bánh canh', 'Bánh đa cua', 'Bún bò Huế', 'Bún bung', 'Bún chả', 'Bún chả cá', 'Bún chạo tôm', 'Bún đậu mắm tôm', 'Miến lươn', 'Bún thịt nướng', 'Bún thang', 'Cơm gà Quảng Nam', 'Cơm cháy Ninh Bình, Cơm cháy hải sản', 'Rau muống xào tỏi', 'Xôi gà', 'Xôi đỗ xanh', 'Xôi lá cẩm', 'Cá lóc nướng trui',  'Chả cá thát lát', 'Chả cá Lã Vọng', 'Trà xanh hương lài
	', 'Bánh bạch tuộc TAKOYAKI', 'Mì tương đen (Jajangmyeon)', 'Bánh mochi giọt nước', 'Mì ramen Nhật Bản', 'Kimbap (cơm cuộn Hàn Quốc)', 'Pizza mini xúc xích', 'Kim chi cải thảo Hàn quốc', 'Xôi xoài Thái Lan', 'Đậu phụ Tứ Xuyên', 'Cơm trộn Hàn Quốc', 'Trứng cuộn cơm', 'Sườn xào chua ngọt', 'Sườn xào chua ngọt', 'Mì Ý xào thịt bò', 'Lẩu Thái chua cay', 'Cà ri bò kiểu Nhật', 'Bánh khoai tây Korokke' ];
	protected $descriptions = ['Được làm từ bột gạo, bột mì, hoặc bột sắn hoặc bột gạo pha bột sắn cán thành tấm và cắt ra thành sợi to và ngắn với nước dùng được nấu từ tôm, cá, giò heo... thêm gia vị tùy theo từng loại', 'Được làm từ bột gạo, bột mì, hoặc bột sắn hoặc bột gạo pha bột sắn cán thành tấm và cắt ra thành sợi to và ngắn với nước dùng được nấu từ tôm, cá, giò heo... thêm gia vị tùy theo từng loại', 'Được làm từ bột gạo, bột mì, hoặc bột sắn hoặc bột gạo pha bột sắn cán thành tấm và cắt ra thành sợi to và ngắn với nước dùng được nấu từ tôm, cá, giò heo... thêm gia vị tùy theo từng loại', 'Bún nấu với sườn và dọc mùng', 'Được làm từ sợi mì bằng bột gạo xay mịn và tráng thành từng lớp bánh mỏng, sau đó thái theo chiều ngang để có những sợi mì mỏng khoảng 2mm. Sợi mì làm bằng bột mỳ được trộn thêm một số phụ gia cho đạt độ dòn, dai.', 
	'Mì xào chín giòn với trứng, rau, hải sản...', 'Được nấu từ miến với thịt lươn có hai dạng: dạng miến lươn khô và miến lươn nước nấu nước dùng là nước xương', 'Cơm cháy là phần cơm dưới đáy nồi khi nấu cơm thường chín vàng giòn, cơm cháy lấy ra xong phải phơi nắng tự nhiên hai, ba nắng, để chỗ thoáng, tránh ẩm mốc, lúc gần ăn mới chiên giòn', 'Cơm nguội trộn với hến luộc, nước hến, mắm ruốc, rau bắp cải, tóp mỡ, bánh tráng nướng, mì xào giòn, ớt màu, đậu phộng nguyên hạt, dầu ăn chín, tiêu và muối', 'Được làm từ gạo nếp cùng một số nguyên liệu khác, cho vào ống tre, giang, nứa và nướng chín trên lửa', 'Là món ăn có từ rất xa xưa của dân tộc. Cơm trắng nóng hổi đem nén chặt thành tấm bằng hai bàn tay rồi xắt miếng chấm với muối vừng vừa dẻo vừa bùi hài hòa vị mặn, ngọt.', 'Được làm ra từ gạo bằng cách đem nấu với một lượng vừa đủ nước, chỉ có nguyên liệu là gạo tẻ và không có thêm gia vị, là thức ăn gần như hàng ngày của người Việt
	', 'Cá tươi đem bỏ ruột, để nguyên con, xẻ đôi, rồi đem phơi khô ngoài nắng. Trước khi phơi có khi cá được xát muối để giúp việc bảo quản. Cá thu và cá thiều khô được nhiều người ưa chuộng.', 'Lòng già được nhồi đầy hỗn hợp gồm tiết và các loại rau, gia vị, tỏi, lạc và đậu xanh. Sau khi nhồi đầy chặt thì được hấp cách thủy cho chín hoặc nướng.', 'Sử dụng rất đa dạng các loại rau, củ, quả phối trộn với muối theo một tỉ lệ nhất định theo kinh nghiệm của người ẩm thực không quá mặn cũng không quá nhạt.', 'Giò là thịt (gia súc, gia cầm) giã nhuyễn, được gói chặt và luộc chín trong nước, thịnh hành trong ẩm thực Việt Nam với nhiều biến thể', 'Món súp với thịt cua, trứng gà hoặc trứng cút ngoài ra còn có xương gà để làm súp thêm vị ngọt và bỗ dưỡng hoặc hạt bắp.', 'Gồm bò bía mặn và bò bía ngọt, đều là bột mì cuốn các nguyện liệu khác', 'Món ăn ngon, nổi tiếng của người Việt và được chế biến từ thịt, trứng, rau củ quả băm nhỏ trộn đều, gói trong bánh đa nem và rán giòn', 'Bánh đa nem cuộn với các loại rau thơm, bún, và một số loại thịt như thịt bò, lợn, vịt, tôm, cá, cua đã nấu chín.', 'Mực được sấy khô hoặc phơi nắng rồi đem nướng hoặc rim chua ngọt để dùng kèm với bia.', 'Món nộm sử dụng nguyên liệu chính là sứa đã được sơ chế, trộn chua ngọt với các loại rau, thịt động vật và gia vị.', 'Ốc luộc lên với sả, khi ăn khều ra chấm nước mắm chua ngọt pha gừng', 'Bột mỳ pha thêm bột nở, rán vừa chín có dạng một cặp gồm thanh bánh dài có kích thước bằng chiếc xúc xích nhỏ dính nhau, ăn bùi và giòn', 'Máu động vật qua luộc, hầm đông cứng thành những khối dạng thạch', 'Trứng vịt khi phôi thành hình luộc lên, để sôi kỹ 5 phút, rồi đập vỏ, ăn phần bên trong ngay lúc còn nóng. Các gia vị phổ biến đi kèm là rau răm, gừng tươi thái chỉ, muối tiêu', 'Loại chả đặc sản của Hạ Long được làm rất cầu kỳ từ mực giã nhuyễn, thì là, hành hoa... nặn thành miếng và chiên ngập dầu', 'Làm từ lúa nếp non, rang chín và giã, sàng sảy cho hết vỏ trấu', 'Bông điên điển là loại rau đặc trưng Nam Bộ được dùng làm dưa chua, nấu canh, ăn lẩu hay làm gỏi trộn thịt gà.', 'Hạt sen được hấp chín, rồi nấu chung với đường cho đến khi sôi nhẹ thì khuấy thêm bột cho sánh.', 'Thân và lá cây thạch đen được phơi khô rồi xay nát, đun sôi trong nước và thêm bột, khi nguội đông lại thành thạch.', 'Đồ chấm làm từ đậu tương, dấm trắng, gạo, muối ăn, bột mì, tỏi, và ớt. Thường dùng ăn kèm phở Nam.', 'Thịt cá nhệch sống được bóp thính gạo cùng một số loại gia vị rồi được dùng với nhiều loại rau ăn kèm và nước chấm gỏi.', 'Một dẻ mía chẻ nhỏ bằng ngón tay, phần trên được bao bằng thịt nạc xay nhuyễn với mực khô, phần dưới để nguyên, dùng để cầm khi ăn', 'Món nộm sử dụng nguyên liệu chính là sứa đã được sơ chế, trộn chua ngọt với các loại rau, thịt động vật và gia vị.', 'Bột mỳ pha thêm bột nở, rán vừa chín có dạng một cặp gồm thanh bánh dài có kích thước bằng chiếc xúc xích nhỏ dính nhau, ăn bùi và giòn', 'Tiết động vật tươi được pha với chút nước mắm hoặc nước muối nhạt hãm cho khỏi đông trước khi trộn với những phần thịt, sụn động vật băm nhỏ để làm đông tiết.', 'Máu động vật qua luộc, hầm đông cứng thành những khối dạng thạch'];

	public function seed(){
		for ($i=0; $i < 50; $i++) { 
			DB::table('dishes')->insert([
				'menu_id' => rand(1, 6),
				'name' => $name[rand(0, count($name) -1 )],
				'price' => rand(20, 100)*1000,

				'rating' => rand(1, 5),
				'ordered' => rand(3, 1000),
				'description' => str_random(25),
				]);
		}
	}
	public static function random_float ($min,$max) {
		return ($min+lcg_value()*(abs($max-$min)));
	}
	
}
