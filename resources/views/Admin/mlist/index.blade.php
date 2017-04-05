@extends('master')
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
<select id="menu">
	<option value="">All</option>
	@foreach($menus as $menu)
	<option value="{{$menu->id}}">{{$menu->name}}</option>
	@endforeach
</select>
<div class="mdl-grid">
	<div class="mdl-cell mdl-cell--4-col"></div>
	<div class="mdl-cell mdl-cell--4-col">
	<div id="list">
		<table class="mdl-data-table mdl-js-data-table mdl-shadow--8dp">
			<tr>
				<th>Id</th>
				<th>Name</th>
			</tr>
			
				@foreach($mlists as $mlist)
				<tr>
					<td>{{$mlist->id}}</td>
					<td>{{$mlist->name}}</td>
				</tr>
				@endforeach
		</table>
	</div>	
	</div>
	<div class="mdl-cell mdl-cell--4-col"></div>
</div>
@endsection