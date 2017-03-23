@extends('master')
@section('title')
Home
@endsection
@if (Auth::check())
@section('nav')
<header class="mdl-layout__header">
	<div class="mdl-layout__header-row">
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

		<div class="material-icons mdl-badge mdl-badge--overlap mdl-button--icon notification" id="notification"
		data-badge="23">
		shopping
	</div>
	<!-- Notifications-->
	
	<div class="material-icons mdl-badge mdl-badge--overlap mdl-button--icon message" id="inbox" data-badge="4">
		mail_outline
	</div>
	<!-- Messages-->

	<div class="avatar-dropdown" id="icon">
		<span>{{ Auth::user()->name }} </span>
		<img src='{{ Auth::user()->avatar }}'>
	</div>
	<!-- Account dropdown-->
	<ul class="mdl-menu mdl-list mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp account-dropdown"
	for="icon">
	<li class="mdl-list__item mdl-list__item--two-line">
		<span class="mdl-list__item-primary-content">
			<span>{{ Auth::user()->name }}</span>
			<span class="mdl-list__item-sub-title">{{ Auth::user()->email }}</span>
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
		<a href="{{ action('Auth\AuthController@getLogout') }}">
			<span class="mdl-list__item-primary-content">
				<i class="material-icons mdl-list__item-icon text-color--secondary">exit_to_app</i>
				Log out
			</span>
		</a>
	</li>
</ul>

<button id="more"
class="mdl-button mdl-js-button mdl-button--icon">
<i class="material-icons">more_vert</i>
</button>

<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp settings-dropdown"
for="more">
<li class="mdl-menu__item">
	Settings
</li>
<a class="mdl-menu__item" href="https://github.com/CreativeIT/getmdl-dashboard/issues">
	Support
</a>
<li class="mdl-menu__item">
	F.A.Q.
</li>
</ul>
</div>
</header>

<div class="mdl-layout__drawer">
	<header>Menu</header>
	<nav class="mdl-navigation"> 
		<a class="mdl-navigation__link mdl-navigation__link--current" href=""> <i class="material-icons" role="presentation">view_comfy</i> Thực đơn </a> 
		<a class="mdl-navigation__link" href=""> <i class="material-icons" role="presentation">Home</i> Info </a> 

		<div class="mdl-layout-spacer"></div>
		<a class="mdl-navigation__link" href=""> <i class="material-icons">view_comfy</i> Discount </a>
		<a class="mdl-navigation__link" href=""> <i class="material-icons" role="presentation">person</i> Account </a>

		<div class="mdl-layout-spacer"></div>
		<a class="mdl-navigation__link" href=""> <i class="material-icons" role="presentation">link</i> GitHub </a> 
	</nav>
</div>
@endsection

@else
@section('nav')
<header class="mdl-layout__header">
	<div class="mdl-layout__header-row">
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

		<div class="material-icons mdl-badge mdl-badge--overlap mdl-button--icon notification" id="notification"
		data-badge="23">
		shopping
	</div>

	<button class="mdl-button mdl-js-button mdl-button--raised" style = "width: 20 px" onclick="window.location='{{ url("auth/login") }}'"> LOG IN </button>
	<button id="more"
	class="mdl-button mdl-js-button mdl-button--icon">
	<i class="material-icons">more_vert</i>
</button>

<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp settings-dropdown"
for="more">
<li class="mdl-menu__item">
	Settings
</li>
<a class="mdl-menu__item" href="https://github.com/CreativeIT/getmdl-dashboard/issues">
	Support
</a>
<li class="mdl-menu__item">
	F.A.Q.
</li>
</ul>
</div>
</header>
<div class="mdl-layout__drawer">
	<header>Header</header>
	<nav class="mdl-navigation"> 

		<a class="mdl-navigation__link" href=""> <i class="material-icons" role="presentation">book</i> Thông tin nhà hàng </a> 
		<a class="mdl-navigation__link" href=""> <i class="material-icons">view_comfy</i> Thông tin khuyến mại </a>
		<a class="mdl-navigation__link" href=""> <i class="material-icons" role="presentation">person</i> Account </a>

		<div class="mdl-layout-spacer"></div>
		<a class="mdl-navigation__link" href=""> <i class="material-icons" role="presentation">link</i> GitHub </a> 
	</nav>
</div>
@endsection

@endif

@section('content')
<main class="mdl-layout__content">
	<!-- -->

	<div class="mdl-grid"> 

		<!--Card-->
		@foreach ($dishes as $dish)
		<div class="mdl-cell mdl-cell--4-col">
			<a class="demo-card-wide mdl-card mdl-shadow--2dp">
				<div class="mdl-card__title">
					<h2 class="mdl-card__title-text">{{ $dish->name }}</h2>
				</div>

				<div class="mdl-card__supporting-text"> {{ $dish->description }} </div>
				<div class="mdl-card__actions mdl-card--border"> 
					<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect show-dialog"> Get Started </a> 
				</div>
				<div class="mdl-card__menu">
					<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"> <i class="material-icons">share</i> </button>
				</div>
			</a>
		</div>
		@endforeach   
	</div>
</main>

@endsection

