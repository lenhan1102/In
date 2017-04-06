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

		<div style="width: 20px"></div>
		<button class="mdl-button mdl-js-button mdl-button--raised" onclick="window.location='{{ route("auth/login") }}'"> LOG IN 
		</button>
		<div style="width: 20px"></div>
		<button id="more" class="mdl-button mdl-js-button mdl-button--icon">
			<i class="material-icons">more_vert</i>
		</button>

		<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp settings-dropdown" for="more">
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
@endsection

@section('drawer')
<div class="mdl-layout__drawer">
	<header class="mdl-layout-title" style="">HTML5 Tutorial</header>
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

@section('main')
<main class= "mdl-layout__content">
	<div class="page_layout" style="padding: 100px">
		<div class="mdl-grid">
			<!-- Cards -->
			@foreach($dishes as $dish)
			<div class="mdl-cell mdl-cell--3-col">
				<div class="mdl-card mdl-shadow--4dp">
					<div class="mdl-card__title">
						<div class="mdl-card__title-text">
							Image
						</div>
					</div>
					<div class="mdl-card__media">
						<img src="{{asset('images/catalog/').$dish->link}}" width="100%" height="140" border="0">
					</div>
					<div class="mdl-card__supporting-text">
						Descriptions
					</div>
					<div class="mdl-card__actions">
						<button class="mdl-button mdl-js-button mdl-button--raised">View</button>
					</div>
				</div>
			</div>
			@endforeach
			<!-- <div class="mdl-cell mdl-cell--3-col">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
					<input class="mdl-textfield__input" type="text" id="sample2" value="Belarus" readonly tabIndex="-1">
					<label for="sample2">
						<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
					</label>
					<label for="sample2" class="mdl-textfield__label">Country</label>
					<ul for="sample2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
						<li class="mdl-menu__item" data-val="DE">Germany</li>
						<li class="mdl-menu__item" data-val="BY">Belarus</li>
						<li class="mdl-menu__item" data-val="RU">Russia</li>
					</ul>
				</div>
			</div> -->
		</div>
	</div>
</div>
</main>
@endsection

