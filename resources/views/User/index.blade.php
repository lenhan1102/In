@extends('master')
@section('title') Món ăn
@endsection



@section('content')
@include('partials._messages')
<div class="mdl-tabs mdl-js-tabs">
	<div class="mdl-tabs__tab-bar">
		<a href="#tab1-panel" class="mdl-tabs__tab is-active" style="color: white;">Tất cả</a>
		@foreach(App\Menu::all() as $menu)
		<a href="#menu{{$menu->id}}" class="mdl-tabs__tab" style="color: white;">{{$menu->name}}</a>
		@endforeach
	</div>
	<div class="mdl-tabs__panel is-active" id="tab1-panel">
		<div class="mdl-grid">
			<!-- Cards -->
			@foreach( App\Dish::all() as $dish)
			<div class="mdl-cell mdl-cell--3-col">
				<div class="mdl-card mdl-shadow--4dp">
					<div class="mdl-card__title">
						<div class="mdl-card__title-text">
							{{$dish->name}}
						</div>
					</div>
					<div class="mdl-card__media">
						<img src="{{asset('images/catalog/').'/'.$dish->avatar}}" width="100%" height="140" border="0">
					</div>
					<div class="mdl-card__supporting-text">
						{{$dish->description}}
					</div>
					<div class="mdl-card__actions">
						<form action="{{route('action.view', ['id' => $dish->id])}}" method="GET">
							{{ csrf_field() }}
							<button type="submit" class="mdl-button mdl-js-button mdl-button--raised">View</button>
						</form>
					</div>
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
				<div class="mdl-card mdl-shadow--4dp">
					<div class="mdl-card__title">
						<div class="mdl-card__title-text">
							{{$dish->name}}
						</div>
					</div>
					<div class="mdl-card__media">
						<img src="{{asset('images/catalog/').'/'.$dish->avatar}}" width="100%" height="140" border="0">
					</div>
					<div class="mdl-card__supporting-text">
						{{$dish->description}}
					</div>
					<div class="mdl-card__actions">
						<form action="{{route('action.view', ['id' => $dish->id])}}" method="GET">
							{{ csrf_field() }}
							<button type="submit" class="mdl-button mdl-js-button mdl-button--raised">View</button>
						</form>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	@endforeach
</div>
@endsection