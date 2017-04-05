<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<link rel="icon" type="image/png" href="{{ asset('images/DB_16х16.png') }}">
	<meta charset="utf-8">
	<title>@yield('title')</title>

	<!-- inject:css -->
	<link href="{{ asset('css/fonts.css') }}" rel='stylesheet' type='text/css'>
	<link href="{{ asset('css/icons.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/lib/getmdl-select.min.css') }}">

	<link rel="stylesheet" href="{{ asset('css/lib/nv.d3.css') }}">
	<link rel="stylesheet" href="{{ asset('css/application.css') }}">
	<!-- endinject -->
	<!-- inject:js --> 
	<script src="{{ asset('js/jquery-3.2.0.js') }}"></script> 
	<script src="{{ asset('js/material.js') }}"></script> 
	<!-- endinject -->


</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
		@yield('nav')
		<main class= "mdl-layout__content">
			@yield('content')
		</main>
		
		<!-- Footer -->
		<footer class="mdl-mini-footer">
			<div class="mdl-mini-footer__left-section">
				<div class="mdl-logo">Title</div>
				<ul class="mdl-mini-footer__link-list">
					<li><a href="#">Help</a></li>
					<li><a href="#">Privacy & Terms</a></li>
				</ul>
			</div>
		</footer>	
	</div>
</body>