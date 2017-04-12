@extends('Admin.admin-master')
@section('title')
Lists
@endsection
@section('content')
<script>
	$(document).ready(function(){
		$("#menu").change(function(){
			var menu = $("#menu").val();
			$.get('{{route('AJAXMlist_updatelist')}}', {menu:menu}, function(data){
				$("#list").html(data);
				console.log(data);
			});
		});
	});
</script>

<div class="mdl-grid" style="margin: 0px 0px">
	<div class="mdl-cell mdl-cell--1-col"></div>
	<div class="mdl-cell mdl-cell--4-col">
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
			<input class="mdl-textfield__input" type="text" id="menu" value="All" readonly tabIndex="-1">
			<label for="menu">
				<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
			</label>
			<label for="menu" class="mdl-textfield__label">Menu</label>
			<ul for="menu" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
				<li class="mdl-menu__item">All</li>
				@foreach($menus as $menu)
				<li class="mdl-menu__item">{{$menu->name}}</li>
				@endforeach
			</ul>
		</div>
	</div>
	<div class="mdl-cell mdl-cell--6-col">
		<div id="list">
			<table class="mdl-data-table mdl-js-data-table mdl-shadow--8dp">
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th></th>
					<th></th>
				</tr>

				@foreach($mlists as $mlist)
				<tr>
					<td>{{$mlist->id}}</td>
					<td>{{$mlist->name}}</td>
					<td><a href="{{route('mlist.edit', ['id' => $mlist->id])}}">Edit</a></td>
					<td><a href="{{route('mlist.destroy', ['id' => $mlist->id])}}">Delete</a></td>
				</tr>
				@endforeach
			</table>
		</div>	
	</div>
</div>
@endsection