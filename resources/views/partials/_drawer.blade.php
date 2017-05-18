<div class="mdl-layout__drawer">
	<header>
		<img src="{{asset('images/logo.png')}}" style="margin: auto; width: 50%; display:-webkit-box;
		-webkit-box-pack:center;
		-webkit-box-align:center;
		">
	</header> 
	<nav class="mdl-navigation"> 
		<a class="mdl-navigation__link" href="{{route('index')}}"> <i class="material-icons" role="presentation">home</i> Home </a> 
		<div class="mdl-layout-spacer"></div>
		<a class="mdl-navigation__link" href="{{route('history')}}"> <i class="material-icons">view_comfy</i> History </a>
		<a class="mdl-navigation__link" href="{{route('profile')}}"> <i class="material-icons" role="presentation">person</i> Account </a>
		<div class="mdl-layout-spacer"></div>
		

		@if(Auth::check() && Auth::user()->hasRole('Provider'))
		<a class="mdl-navigation__link" href="{{route('dish.index')}}"> <i class="material-icons" role="presentation">person</i> Dish </a>
		<a class="mdl-navigation__link" href="{{route('menu.index')}}"> <i class="material-icons" role="presentation">person</i> Menu </a>
		<a class="mdl-navigation__link" href="{{route('order.index')}}"> <i class="material-icons" role="presentation">person</i> Order </a>
		@endif
		

		<div class="mdl-layout-spacer"></div>
		@if(Auth::check() && Auth::user()->hasRole('Admin'))
		<a class="mdl-navigation__link" href="{{route('user.index')}}"> <i class="material-icons" role="presentation">person</i> Manage Accounts </a>
		@endif
		<div class="mdl-layout-spacer"></div>
		
	</nav>
</div>