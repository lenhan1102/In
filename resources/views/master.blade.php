<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>@yield('title')</title>

	<!-- inject:css -->
	<link href="{{ asset('css/fonts.css') }}" rel='stylesheet' type='text/css'>
	<!-- <link href="{{ asset('css/icons.css') }}" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/lib/getmdl-select.min.css') }}">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="{{ asset('css/lib/nv.d3.css') }}">
	<link rel="stylesheet" href="{{ asset('css/application.css') }}">
	<!-- endinject -->
	<!-- inject:js --> 
	<script src="{{ asset('js/jquery-3.2.1.js') }}"></script> 
	<script src="{{ asset('js/material.js') }}"></script> 
	<script src="{{ asset('js/getmdl-select.min.js') }}"></script>
	@yield('script')

	<!-- endinject -->


</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-drawer is-small-screen">	
		@include('partials._header')
		@include('partials._drawer')
		<main class= "mdl-layout__content" style="background-color: #f1f1f1; min-height: 100%; background:url('{{asset('images/mdbackground/17.jpg')}}'); height: auto !important; height: 100%; flex: 1 0 auto;">

			<div class="page_content mdl-shadow--8dp" style="margin: auto; margin-top: 40px; margin-bottom: 35px; width: 90%; ; background-color: white; position:relative; border-radius: 6px;">
				@yield('content')
			</div>

			<!-- <div class='push' style="height: 340px">
				<div style="height: 220px"></div>
				<div style="height: 120px">@include('partials._footer')</div>
			</div> -->
		</main>
		@include('partials._footer')
	</div>
</body>