<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>@yield('title')</title>

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
	@yield('script')

	<!-- endinject -->


</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">	
		@include('partials._header')
		@include('partials._drawer')
		<main class= "mdl-layout__content" style="background-color: #f1f1f1">
			<img class="bg_image mdl-shadow--2dp" src="{{asset('images/16.jpg')}}" style="width: 100%; height: 600px; position:relative;">
			</img>
			<div class="page_content mdl-shadow--8dp" style="margin: auto; margin-top: -150px; margin-bottom: 35px; width: 80%; background-color: white; position:relative; border-radius: 6px;">
				@yield('content')
			</div>
			@yield('post_content')
			@include('partials._footer')
		</main>
		
	</div>
</body>