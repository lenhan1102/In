@extends('master')
@section('title') Dishes
@endsection

@section('content')
<script>
	$(document).ready(function(){
		$("#menu_options").change(function(){
			var menuid = $("#menu_options").val();
			$.get('{{route('AJAXList')}}', {menuid:menuid}, function(data){
				$("#list_options").html(data);
			});
		});
		$("#list_options").change(function(){
			var listid = $("#list_options").val();
			var menuid = $("#menu_options").val();
			$.get('{{route('AJAXDish')}}', {listid:listid, menuid:menuid}, function(data){
				$("#dish").html(data);
				//console.log(data);
			});
		});
	});
</script>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
	<input class="mdl-textfield__input" type="text" id="sample2" value="Belarus" readonly tabIndex="-1">
	<label for="sample2">
		<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
	</label>
	<label for="sample2" class="mdl-textfield__label">Country</label>
	<ul for="sample2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
		@foreach(App\Menu::all() as $key => $menu)
		<li class="mdl-menu__item" data-val="DE" id="{{$key+1}}">{{$menu->name}}</li>
		@endforeach
	</ul>
</div>
<a href="{{route('dish.create')}}">New</a>
<table class="mdl-data-table mdl-js-data-table mdl-shadow--8dp" width="100%">
	<thead>
		<tr>
			<th class="mdl-data-table__cell--non-numeric">STT</th>
			<th class="mdl-data-table__cell--non-numeric">Name</th>
			<th class="mdl-data-table__cell--non-numeric">Price</th>
			<th class="mdl-data-table__cell--non-numeric">Order</th>
			<th class="mdl-data-table__cell--non-numeric">Rating</th>
			<th class="mdl-data-table__cell--non-numeric">Description</th>
			<th class="mdl-data-table__cell--non-numeric"></th>
		</tr>
	</thead>
	<tbody>
		@foreach($dishes as $key => $dish)
		<tr>
			<td class="mdl-data-table__cell--non-numeric">{{$key+1}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{$dish->name}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{$dish->price}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{$dish->ordered}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{$dish->rating}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{$dish->description}}</td>
			<td class="mdl-data-table__cell--non-numeric">
				<form action ="{{route('dish.edit', ['id' => $dish->id])}}" method="GET">
					{{csrf_field()}}
					<button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab">
						<i class="material-icons">edit</i>
					</button>
				</form>
				<form action ="{{route('dish.destroy', ['id' => $dish->id])}}" method="POST">
					{{csrf_field()}}
					{{ method_field('DELETE') }}
					<button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab">
						<i class="material-icons">delete</i>
					</button>
				</form>
			</td>
		</tr>
		@endforeach

	</tbody>
</table>
@endsection