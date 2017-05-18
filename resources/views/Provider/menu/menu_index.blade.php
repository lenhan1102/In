@extends('master')
@section('title')
Menu Manager
@endsection
@section('content')

<script>
	$(document).ready(function(){
		$("#menu").change(function(){
			var menu = $("#menu").val();
			$.get('{{route('AJAXMlist_updatelist')}}', {menu:menu}, function(data){
				$("#list").html(data);
			});
		});
	});
</script>
<div style="background-color: #4e4e4e;" >
	@include('partials._messages')
	<form action="{{route('menu.create')}}" method="POST">
		{{csrf_field()}}
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
			<label class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" for="create">
				<i class="material-icons">add</i>
			</label>
			<div class="mdl-textfield__expandable-holder" style="margin-left: 50px">
				<input class="mdl-textfield__input" name="name" type="text" id="create">
				<label class="mdl-textfield__label" for="sample-expandable"></label>
			</div>
		</div>
	</form>
</div>

<table class="mdl-data-table mdl-js-data-table mdl-shadow--8dp" width="100%">
	<thead>
		<tr>
			<th class="mdl-data-table__cell--non-numeric">STT</th>
			<th class="mdl-data-table__cell--non-numeric">Name</th>
			<th class="mdl-data-table__cell--non-numeric">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach(App\Menu::all() as $key => $menu)
		<tr>
			<td class="mdl-data-table__cell--non-numeric">{{$key+1}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{$menu->name}}</td>
			<td class="mdl-data-table__cell--non-numeric">
				<form action="{{route('menu.update', ['id' => $menu->id])}}" method="POST">
					{{csrf_field()}}
					{{ method_field('PUT') }}
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
						<label class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" for="{{$menu->id}}">
							<i class="material-icons">edit</i>
						</label>
						<div class="mdl-textfield__expandable-holder">
							<input class="mdl-textfield__input" name="name" type="text" id="{{$menu->id}}">
							<label class="mdl-textfield__label" for="sample-expandable"></label>
						</div>
					</div>
				</form>
				<form action ="{{route('menu.destroy', ['id' => $menu->id])}}" method="POST">
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