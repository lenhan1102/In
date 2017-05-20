@extends('master')
@section('title') Món ăn
@endsection

@section('script')
<script type="text/javascript">
	$.fn.xstar = function() {
		return $(this).each(function() {
			$(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * 16));
		});
	}
	$(function() {
		$('span.xstar').xstar();
	});

</script>
@endsection
@section('content')
@include('partials._messages')
<div class="mdl-tabs mdl-js-tabs">
	<div class="mdl-tabs__tab-bar" style="background: #f1f1f1;">
		<a href="#tab1-panel" class="mdl-tabs__tab is-active">Tất cả</a>
		@foreach(App\Menu::all() as $menu)
		<a href="#menu{{$menu->id}}" class="mdl-tabs__tab">{{$menu->name}}</a>
		@endforeach
	</div>
	<div class="mdl-tabs__panel is-active" id="tab1-panel">
		<div class="mdl-grid" style="background: #f1f1f1;">
			<!-- Cards -->
			@foreach( App\Dish::all() as $dish)
			@include('partials._dishcard')
			@endforeach
		</div>
	</div>
	@foreach(App\Menu::all() as $menu)
	<div class="mdl-tabs__panel" id="menu{{$menu->id}}">
		<div class="mdl-grid" style="background: #f1f1f1; ">
			<!-- Cards -->
			@foreach($menu->dishes as $dish)
			@include('partials._dishcard')
			@endforeach
		</div>
	</div>
	@endforeach
</div>
@endsection