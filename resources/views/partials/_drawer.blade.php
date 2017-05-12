<div class="mdl-layout__drawer">
	<header>Menu</header> 
	<nav class="mdl-navigation"> 
		<a class="mdl-navigation__link" href=""> <i class="material-icons" role="presentation">home</i> Info </a> 
		@if(Auth::user()->hasRole('Provider'))
		<a class="mdl-navigation__link" href="{{route('dish.index')}}"> <i class="material-icons" role="presentation">person</i> Manage Dish </a>
		<a class="mdl-navigation__link" href="{{route('menu.index')}}"> <i class="material-icons" role="presentation">person</i> Manage Menu </a>
		<a class="mdl-navigation__link" href="{{route('order.index')}}"> <i class="material-icons" role="presentation">person</i> Manage Order </a>
		@endif
		<div class="mdl-layout-spacer"></div>
		<a class="mdl-navigation__link" href="{{route('history')}}"> <i class="material-icons">view_comfy</i> History </a>
		<a class="mdl-navigation__link" href="{{route('profile')}}"> <i class="material-icons" role="presentation">person</i> Account </a>

		<div class="mdl-layout-spacer"></div>
		@if(Auth::user()->hasRole('Admin'))
		<a class="mdl-navigation__link" href="{{route('user.index')}}"> <i class="material-icons" role="presentation">person</i> Manage Account </a>
		<a class="mdl-navigation__link" href="{{route('order.index')}}"> <i class="material-icons" role="presentation">person</i> Manage Order </a>
		@endif
	</nav>
</div>