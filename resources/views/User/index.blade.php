@extends('master')
@section('title') Món ăn
@endsection


@section('content')
@include('partials._messages')
<div class="mdl-tabs mdl-js-tabs">
	<div class="mdl-tabs__tab-bar" style="background: #f1f1f1; border-top-right-radius: 10px; border-top-left-radius: 10px;">
		<a href="#tab1-panel" class="mdl-tabs__tab is-active">Tất cả</a>
		@foreach(App\Menu::all() as $menu)
		<a href="#menu{{$menu->id}}" class="mdl-tabs__tab">{{$menu->name}}</a>
		@endforeach
	</div>
	<div class="mdl-tabs__panel is-active" id="tab1-panel">
		<div class="mdl-grid" style="background: #f1f1f1; border-radius: 10px;">
			<!-- Cards -->
			@foreach( App\Dish::all() as $dish)
			<div class="mdl-cell mdl-cell--3-col">
				<a href="{{route('action.view', ['id' => $dish->id])}}">
					<div class="mdl-card  dish-card">
						<div class="mdl-card__title">
							<div class="mdl-card__title-text">
								{{$dish->name}}
							</div>
						</div>
						<div class="mdl-card__media">
							<img src="{{asset('images/catalog/').'/'.$dish->avatar}}" width="100%" height="140" border="0">
						</div>
						<div class="mdl-card__supporting-text" href="{{route('action.view', ['id' => $dish->id])}}">
							{{$dish->description}}
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>
	@foreach(App\Menu::all() as $menu)
	<div class="mdl-tabs__panel" id="menu{{$menu->id}}">
		<div class="mdl-grid" style="background: #f1f1f1; border-radius: 10px;">
			<!-- Cards -->
			@foreach($menu->dishes as $dish)
			<div class="mdl-cell mdl-cell--3-col">
				<a href="{{route('action.view', ['id' => $dish->id])}}">
					<div class="mdl-card  dish-card">
						<div class="mdl-card__title">
							<div class="mdl-card__title-text">
								{{$dish->name}}
							</div>
						</div>
						<div class="mdl-card__media">
							<img src="{{asset('images/catalog/').'/'.$dish->avatar}}" width="100%" height="140" border="0">
						</div>
						<div class="mdl-card__supporting-text" href="{{route('action.view', ['id' => $dish->id])}}">
							{{$dish->description}}
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>
	@endforeach
</div>
@endsection