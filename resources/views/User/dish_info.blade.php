@extends('User.user-master')

@section('title')
{{$dish->name}}
@endsection
@section('header')
<script type="text/javascript">
	$(document).ready(function(){
		$("#add").click(function(){
			$.get('{{route('action.addToCart', ["id" => $dish->id])}}', function(data){
				$("#cart > div").attr('data-badge', data);
			});
		});
	});
</script>
<header class="mdl-layout__header">
	<div class="mdl-layout__header-row">
		<!-- Title -->
		<span class="mdl-layout-title">Logo</span>
		<div class="mdl-layout-spacer"></div>
		<!-- Search-->
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
			<label class="mdl-button mdl-js-button mdl-button--icon" for="search">
				<i class="material-icons">search</i>
			</label>
			<div class="mdl-textfield__expandable-holder">
				<input class="mdl-textfield__input" type="text" id="search"/>
				<label class="mdl-textfield__label" for="search">Enter your query...</label>
			</div>
		</div>

		<!-- Notifications-->
		<div class="material-icons mdl-badge mdl-badge--overlap mdl-button--icon notification" id="notification" data-badge="23">shopping</div>
		
		<!-- Messages-->
		<div id="cart">
			@if(!Session::has('cart') || Session::get('cart') == 0)
			<div class="material-icons mdl-badge mdl-badge--overlap mdl-button--icon message"  onclick="window.location='{{route('action.cart')}}'">
				mail_outline
			</div>
			@else
			<div class="material-icons mdl-badge mdl-badge--overlap mdl-button--icon message" onclick="window.location='{{route('action.cart')}}'" data-badge="{{Session::get('badge')}}">
				mail_outline
			</div>
			@endif
		</div>
		

		<!-- Account dropdown-->
		<div class="avatar-dropdown" id="icon">
			<span>aaaaaaaaaaaaaaa </span>
			<img src=''>
		</div>

		<ul class="mdl-menu mdl-list mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp account-dropdown" for="icon">
			<li class="mdl-list__item mdl-list__item--two-line">
				<span class="mdl-list__item-primary-content">
					<span>aaaaaaaa</span>
					<span class="mdl-list__item-sub-title">aaaaaaaaaa</span>
				</span>
			</li>
			<li class="list__item--border-top"></li>
			<li class="mdl-menu__item mdl-list__item">
				<span class="mdl-list__item-primary-content">
					<i class="material-icons mdl-list__item-icon">account_circle</i>
					My account
				</span>
			</li>
			<li class="mdl-menu__item mdl-list__item">
				<span class="mdl-list__item-primary-content">
					<i class="material-icons mdl-list__item-icon">check_box</i>
					My tasks
				</span>
				<span class="mdl-list__item-secondary-content">
					<span class="label background-color--primary">3 new</span>
				</span>
			</li>
			<li class="mdl-menu__item mdl-list__item">
				<span class="mdl-list__item-primary-content">
					<i class="material-icons mdl-list__item-icon">perm_contact_calendar</i>
					My events
				</span>
			</li>
			<li class="list__item--border-top"></li>
			<li class="mdl-menu__item mdl-list__item">
				<span class="mdl-list__item-primary-content">
					<i class="material-icons mdl-list__item-icon">settings</i>
					Settings
				</span>
			</li>
			<li class="mdl-menu__item mdl-list__item">
				<a href="{{ route('auth/logout') }}">
					<span class="mdl-list__item-primary-content">
						<i class="material-icons mdl-list__item-icon text-color--secondary">exit_to_app</i>
						Log out
					</span>
				</a>
			</li>
		</ul>

		<button id="more" class="mdl-button mdl-js-button mdl-button--icon"><i class="material-icons">more_vert</i></button>

		<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp settings-dropdown" for="more">
			<li class="mdl-menu__item">Settings</li>
			<a class="mdl-menu__item" href="">
				Support
			</a>
			<li class="mdl-menu__item">
				F.A.Q.
			</li>
		</ul>
	</div>
</header>
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
			<h3 style="font-size:16px; white-space: pre-line;line-height: normal;" class="name-hot-restaurant" itemprop="name">Đồ ăn - Ăn nhanh & Ăn vặt
			</h3>
			<p>$6000</p>
			<p style="font-size:12px;">Tập đoàn do doanh nhân Yonghong Li đứng đầu, Rossoneri Sport Investment Lux mua được đội bóng đá AC Milan với giá 786 triệu đôla. AC Milan với giá 786 triệu đôla.AC Milan với giá 786 triệu đôla. </p>
		</div>
		<div  class="mdl-cell mdl-cell--12-col">
			<button id="add" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised" value="{{$dish->id}}"> Thêm </button> 
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