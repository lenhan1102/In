
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
		
		<!-- Cart -->
		<div id="cart">
			@if(!Session::has('cart') || Session::get('cart')->totalQty == 0)
			<div class="material-icons mdl-badge mdl-badge--overlap mdl-button--icon message"  onclick="window.location='{{route('action.cart')}}'">
				shopping
			</div>
			@else
			<div class="material-icons mdl-badge mdl-badge--overlap mdl-button--icon message" onclick="window.location='{{route('action.cart')}}'" data-badge="{{Session::get('cart')->totalQty}}">
				shopping
			</div>
			@endif
		</div>

		<!-- Account dropdown-->
		<div class="avatar-dropdown" id="icon">
			<span>{{Auth::user()->username}}</span>
			<img src='
			@if(count(Auth::user()->social_accounts))
			{{Auth::user()->avatar}}
			@else
			{{count(Auth::user()->avatar)? asset("images/avatars/" . Auth::user()->avatar) : asset("images/avatars/" . "card.jpg")}}
			@endif'
			>
		</img>
	</div>

	<ul class="mdl-menu mdl-list mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp account-dropdown" for="icon">
		<li class="mdl-list__item mdl-list__item--two-line">
			<span class="mdl-list__item-primary-content">
				<span>{{Auth::user()->username}}</span>
				<span class="mdl-list__item-sub-title">{{Auth::user()->email}}</span>
			</span>
		</li>
		<li class="list__item--border-top"></li>
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
		<a class="mdl-navigation__link" href=""> <i class="material-icons">view_comfy</i> History </a>
		<a class="mdl-navigation__link" href=""> <i class="material-icons" role="presentation">person</i> Account </a>

		<div class="mdl-layout-spacer"></div>
		<a class="mdl-navigation__link" href=""> <i class="material-icons" role="presentation">link</i> GitHub </a> 
	</nav>
</div>
@endsection

@section('main')
<main class= "mdl-layout__content">
	<div class="page_content" style="margin: 40px 80px">
		@yield('content')
	</div>
</main>
@endsection