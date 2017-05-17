@extends('master')
@section('title') Món ăn
@endsection


@section('content')
@include('partials._messages')
<div class="mdl-tabs mdl-js-tabs">
	<div class="mdl-tabs__tab-bar">
		<a href="#tab1-panel" class="mdl-tabs__tab is-active" style="color: #757575;">Tất cả</a>
		@foreach(App\Menu::all() as $menu)
		<a href="#menu{{$menu->id}}" class="mdl-tabs__tab" style="color: #757575;">{{$menu->name}}</a>
		@endforeach
	</div>
	<div class="mdl-tabs__panel is-active" id="tab1-panel">
		<div class="mdl-grid">
			<!-- Cards -->
			@foreach( App\Dish::all() as $dish)
			<div class="mdl-cell mdl-cell--3-col">
				<div class="mdl-card ">
					<div class="mdl-card__title">
						<div class="mdl-card__title-text">
							{{$dish->name}}
						</div>
					</div>
					<div class="mdl-card__media">
						<img src="{{asset('images/catalog/').'/'.$dish->avatar}}" width="100%" height="140" border="0">
					</div>
					<a class="mdl-card__supporting-text" href="{{route('action.view', ['id' => $dish->id])}}">
						{{$dish->description}}
					</a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	@foreach(App\Menu::all() as $menu)
	<div class="mdl-tabs__panel" id="menu{{$menu->id}}">
		<div class="mdl-grid">
			<!-- Cards -->
			@foreach($menu->dishes as $dish)
			<div class="mdl-cell mdl-cell--3-col">
				<div class="mdl-card">
					<div class="mdl-card__title">
						<div class="mdl-card__title-text">
							{{$dish->name}}
						</div>
					</div>
					<div class="mdl-card__media">
						<img src="{{asset('images/catalog/').'/'.$dish->avatar}}" width="100%" height="140" border="0">
					</div>
					<a class="mdl-card__supporting-text" href="{{route('action.view', ['id' => $dish->id])}}">
						{{$dish->description}}
					</a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	@endforeach
</div>
@endsection