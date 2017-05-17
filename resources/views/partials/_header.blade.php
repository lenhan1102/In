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

		@if(Auth::check())
		<!-- Account dropdown-->
		<div class="avatar-dropdown" id="icon">
			<span>{{Auth::user()->username}}</span>

			<img src='{{Auth::user()->getAvatar()}}'/>
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
		@else
		<div style="width: 20px"></div>
		<button class="mdl-button mdl-js-button mdl-button--raised" onclick="window.location='{{route('auth/login')}}'"> LOG IN 
		</button>
		@endif

		<button id="more" class="mdl-button mdl-js-button mdl-button--icon"><i class="material-icons">more_vert</i></button>

		<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp settings-dropdown" for="more">
			<li class="mdl-menu__item">Settings</li>
			<li class="mdl-menu__item">
				Support
			</li>
			<li class="mdl-menu__item">
				F.A.Q.
			</li>
		</ul>
	</div>
</header>