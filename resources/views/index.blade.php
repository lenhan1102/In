@extends('master')

@section('title')
Homez
@endsection

@section('header')
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
@endsection

@section('drawer')
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
@endsection

@section('main')
<main class= "mdl-layout__content">
	<div class="page_layout" style="margin: 40px 80px">
		<div class="mdl-tabs mdl-js-tabs">
			<div class="mdl-tabs__tab-bar">
				<a href="#tab1-panel" class="mdl-tabs__tab is-active" style="color: white;">Tất cả</a>
				@foreach(App\Menu::all() as $menu)
				<a href="#menu{{$menu->id}}" class="mdl-tabs__tab" style="color: white;">{{$menu->name}}</a>
				@endforeach
			</div>
			<div class="mdl-tabs__panel is-active" id="tab1-panel">
				<div class="mdl-grid">
					<!-- Cards -->
					@foreach( App\Dish::all() as $dish)
					<div class="mdl-cell mdl-cell--3-col">
						<div class="mdl-card mdl-shadow--4dp">
							<div class="mdl-card__title">
								<div class="mdl-card__title-text">
									{{$dish->name}}
								</div>
							</div>
							<div class="mdl-card__media">
								<img src="{{asset('images/catalog/').'/'.$dish->avatar}}" width="100%" height="140" border="0">
							</div>
							<div class="mdl-card__supporting-text">
								{{$dish->description}}
							</div>
							<div class="mdl-card__actions">
								<form action="{{route('action.view', ['id' => $dish->id])}}" method="GET">
									{{ csrf_field() }}
									<button type="submit" class="mdl-button mdl-js-button mdl-button--raised">View</button>
								</form>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			@foreach(App\Menu::all() as $menu)
			<div class="mdl-tabs__panel" id="menu{{$menu->id}}">
				<div class="mdl-grid">
					<!-- Cards -->
					@foreach($menu->mlists as $mlist)
					@foreach($mlist->dishes as $dish)
					<div class="mdl-cell mdl-cell--3-col">
						<div class="mdl-card mdl-shadow--4dp">
							<div class="mdl-card__title">
								<div class="mdl-card__title-text">
									{{$dish->name}}
								</div>
							</div>
							<div class="mdl-card__media">
								<img src="{{asset('images/catalog/').'/'.$dish->avatar}}" width="100%" height="140" border="0">
							</div>
							<div class="mdl-card__supporting-text">
								{{$dish->description}}
							</div>
							<div class="mdl-card__actions">
								<form action="{{route('action.view', ['id' => $dish->id])}}" method="GET">
									{{ csrf_field() }}
									<button type="submit" class="mdl-button mdl-js-button mdl-button--raised">View</button>
								</form>
							</div>
						</div>
					</div>
					@endforeach
					@endforeach
				</div>
			</div>
			@endforeach
		</div>
	</div>
</main>
@endsection