@extends('User.user-master')

@section('title')
{{$dish->name}}
@endsection

@section('content')
<div style="height: 350px; background-color: rgba(45, 43, 43, 0.48); color: white; width: 80%; margin: auto;" class="mdl-grid mdl-shadow--8dp">
	<div class="mdl-cell mdl-cell--6-col">
		<div class="w3-content w3-display-container mdl-shadow--8dp" style="height: 100%">
			<img class="mySlides" src="{{asset('images/catalog/14 Bun_cha.jpg')}}" style="width: 100%; height: 100%">
			<img class="mySlides" src="{{asset('images/catalog/15 Ga_tam_mam_nhi.jpg')}}" style="width:100%; height: 100%">
			<img class="mySlides" src="{{asset('images/catalog/16 Lau_ga_tiem_ot_hiem.jpg')}}" style="width:100%; height: 100%">
			<img class="mySlides" src="{{asset('images/catalog/17 Tra_sua_Gong_Cha.jpg')}}" style="width:100%; height: 100%">

			<button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
			<button class="w3-button w3-display-right" onclick="plusDivs(1)">&#10095;</button>
		</div>
	</div>
	<div class="mdl-cell mdl-cell--6-col mdl-grid" >
		<div class="mdl-cell mdl-cell--12-col" style="height: 60%">
			<h3 style="margin-top: 0px; font-size:20px;">Café/Dessert - Việt Nam 
			</h3>
			<h1 style="font-size:12px; white-space: pre-line;line-height: normal;" class="name-hot-restaurant" itemprop="name">Đồ ăn - Ăn nhanh & Ăn vặt
			</h1>
			<p>$6000</p>
			<p rows="4" cols="50">Tập đoàn do doanh nhân Yonghong Li đứng đầu, Rossoneri Sport Investment Lux mua được đội bóng đá AC Milan với giá 786 triệu đôla.AC Milan với giá 786 triệu đôla.AC Milan với giá 786 triệu đôla. </p>
		</div>
		<div  class="mdl-cell mdl-cell--12-col">
			<form action="{{route('user.addToCart', ['id' => $dish->id])}}" method="get">
				{{ csrf_field() }}
				<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised"> Thêm </button>
			</form>
		</div>
	</div>
</div>

<script>
	var slideIndex = 1;
	showDivs(slideIndex);

	function plusDivs(n) {
		showDivs(slideIndex += n);
	}

	function showDivs(n) {
		var i;
		var x = document.getElementsByClassName("mySlides");
		if (n > x.length) {
			slideIndex = 1
		}    
		if (n < 1) {
			slideIndex = x.length
		}
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";  
		}
		x[slideIndex-1].style.display = "block";  
	}
</script>
@endsection