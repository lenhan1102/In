<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<link rel="icon" type="image/png" href="{{ asset('images/DB_16х16.png') }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Home</title>

	<!-- inject:css -->
	<link href="{{ asset('css/fonts.css') }}" rel='stylesheet' type='text/css'>
	<link href="{{ asset('css/icons.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/lib/getmdl-select.min.css') }}">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="{{ asset('css/lib/nv.d3.css') }}">
	<link rel="stylesheet" href="{{ asset('css/application.css') }}">
	<!-- endinject -->
	<!-- inject:js --> 
	<script src="{{ asset('js/jquery-3.2.1.js') }}"></script> 
	<script src="{{ asset('js/material.js') }}"></script> 
	<script src="{{ asset('js/getmdl-select.min.js') }}"></script>

	<!-- endinject -->


</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
		<header class="mdl-layout__header">
			<div class="mdl-layout__header-row">
				<!-- Title -->
				<span class="mdl-layout-title">Logo</span>
				<div class="mdl-layout-spacer"></div>
				<!-- Search-->
				<form action="{{route('search')}}" method="GET">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
						<label class="mdl-button mdl-js-button mdl-button--icon" for="search">
							<i class="material-icons">search</i>
						</label>
						<div class="mdl-textfield__expandable-holder">
							<input class="mdl-textfield__input" name="key" type="text" id="search">
							<label class="mdl-textfield__label" for="sample-expandable">Expandable Input</label>
						</div>
					</div>
				</form>

				<div style="width: 20px"></div>
				<button class="mdl-button mdl-js-button mdl-button--raised" onclick="window.location='{{route('auth/login')}}'"> LOG IN 
				</button>

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


		<div class="mdl-layout__drawer">
			<header> Menu </header> 
			<nav class="mdl-navigation"> 
				<a class="mdl-navigation__link" href=""> <i class="material-icons" role="presentation">view_comfy</i> Thực đơn </a> 
				<a class="mdl-navigation__link" href=""> <i class="material-icons" role="presentation">Home</i> Info </a> 

				<div class="mdl-layout-spacer"></div>
				<a class="mdl-navigation__link" href=""> <i class="material-icons">view_comfy</i> Discount </a>
				<a class="mdl-navigation__link" href=""> <i class="material-icons" role="presentation">person</i> Account </a>

				<div class="mdl-layout-spacer"></div>
				<a class="mdl-navigation__link" href=""> <i class="material-icons" role="presentation">link</i> GitHub </a> 
			</nav>
		</div>

		<main class= "mdl-layout__content">
			<div class="page_layout" style="margin: 40px 80px">
				<div class="mdl-tabs mdl-js-tabs">
					<div class="mdl-tabs__tab-bar">
						<a href="#tab1-panel" class="mdl-tabs__tab is-active" style="color: #757575;">Tất cả</a>
						@foreach(App\Menu::all() as $menu)
						<a href="#menu{{$menu->id}}" class="mdl-tabs__tab" style="color: #757575;">{{$menu->name}}</a>
						@endforeach
					</div>
					<div class="mdl-tabs__panel is-active" id="tab1-panel">
						<div class="mdl-grid">
							<!-- Cards -->
							@foreach( App\Dish::all() as $dish)
							<div class="mdl-cell mdl-cell--3-col">
								<div class="mdl-card">
									<div class="mdl-card__title">
										<div class="mdl-card__title-text">
											{{$dish->name}}
										</div>
									</div>
									<div class="mdl-card__media">
										<img src="{{asset('images/catalog/').'/'.$dish->avatar}}" width="100%" height="140" border="0">
									</div>
									<a class="mdl-card__supporting-text" href="{{route('action.view', ['id' => $dish->id])}}">
										{{$dish->description}}
									</a>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					@foreach(App\Menu::all() as $menu)
					<div class="mdl-tabs__panel" id="menu{{$menu->id}}">
						<div class="mdl-grid">
							<!-- Cards -->
							@foreach($menu->dishes as $dish)
							<div class="mdl-cell mdl-cell--3-col">
								<div class="mdl-card">
									<div class="mdl-card__title">
										<div class="mdl-card__title-text">
											{{$dish->name}}
										</div>
									</div>
									<div class="mdl-card__media">
										<img src="{{asset('images/catalog/').'/'.$dish->avatar}}" width="100%" height="140" border="0">
									</div>
									<a class="mdl-card__supporting-text" href="{{route('action.view', ['id' => $dish->id])}}">
										{{$dish->description}}
									</a>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</main>
		@include('partials._footer')
	</div>
</body>