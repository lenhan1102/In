
@extends('master')

@section('title')
Home
@endsection

@section('header')
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
			@if(!Session::has('badge') || Session::get('badge') == 0)
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

@section('drawer')
<div class="mdl-layout__drawer">
	<header>Menu</header> 
	<nav class="mdl-navigation"> 
		<a class="mdl-navigation__link" href=""> <i class="material-icons" role="presentation">home</i> Info </a> 
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
	<div class="page_layout" style="margin: 20px 40px">
		@yield('content')
	</div>
</main>
@endsection