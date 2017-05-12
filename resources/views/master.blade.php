<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<link rel="icon" type="image/png" href="{{ asset('images/DB_16х16.png') }}">
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
		<main class= "mdl-layout__content">
			<div class="page_content" style="margin: 40px 80px">
				@yield('content')
			</div>
		</main>
		@include('partials._footer')
	</div>
</body>