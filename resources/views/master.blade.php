<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
<link rel="icon" type="image/png" href="{{ asset('images/DB_16х16.png') }}">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>

<!-- Add to homescreen for Chrome on Android -->
<meta name="mobile-web-app-capable" content="yes">

<!-- Add to homescreen for Safari on iOS -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="Material Design Lite">

<!-- Tile icon for Win8 (144x144 + tile color) -->
<meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
<meta name="msapplication-TileColor" content="#3372DF">

<!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
<!--
    <link rel="canonical" href="http://www.example.com/">
    -->

<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet'
          type='text/css'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('css/lib/getmdl-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/lib/nv.d3.css') }}">
<link rel="stylesheet" href="{{ asset('css/application.css') }}">
<!-- endinject -->
<!-- inject:js --> 
<script src="{{ asset('js/d3.js') }}"></script> 
<script src="{{ asset('js/getmdl-select.min.js') }}"></script> 
<script src="{{ asset('js/material.js') }}"></script> 
<script src="{{ asset('js/nv.d3.js') }}"></script> 

<!-- endinject -->


</head>
<body background="{{ asset('images/Dark_background_1920x1080.png') }}" >
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
	@yield('nav')
	@yield('content')
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