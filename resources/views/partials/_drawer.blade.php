<div class="mdl-layout__drawer">
	
	<header style="background-color: #117d4a; height: 55px;">Dashboard</header>
        <nav class="mdl-navigation" style="background-color: #117d4a">
            <a class="mdl-navigation__link mdl-navigation__link--current" href="{{route('index')}}">
                <i class="material-icons" role="presentation">dashboard</i>
                Dashboard
            </a>
            <a class="mdl-navigation__link" href="{{route('profile')}}">
                <i class="material-icons" role="presentation">person</i>
                Account
            </a>
            <a class="mdl-navigation__link" href="#">
                <i class="material-icons" role="presentation">map</i>
                Maps
            </a>
            <a class="mdl-navigation__link" href="#">
                <i class="material-icons">view_comfy</i>
                UI Elements
            </a>
            <a class="mdl-navigation__link" href="{{route('history')}}">
                <i class="material-icons">history</i>
                History
            </a>
            @can('go_to_admin')
            <a class="mdl-navigation__link mdl-navigation__link--current" href="{{route('user.index')}}">
                <i class="material-icons" role="presentation">supervisor_account</i>
                Accounts
            </a>
            @endcan
            @can('go_to_provider')
            <a class="mdl-navigation__link" href="{{route('dish.index')}}">
                <i class="material-icons" role="presentation">restaurant</i>
                Dishes
            </a>
            <a class="mdl-navigation__link" href="{{route('menu.index')}}">
                <i class="material-icons" role="presentation">book</i>
                Menus
            </a>
            <a class="mdl-navigation__link" href="{{route('order.index')}}">
                <i class="material-icons">contacts</i>
                Orders
            </a>
            @endcan

            <div class="mdl-layout-spacer"></div>
            <a class="mdl-navigation__link" href="#">
                <i class="material-icons" role="presentation">link</i>
                GitHub
            </a>
        </nav>
</div>