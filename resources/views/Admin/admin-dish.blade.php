@extends('master')
@section('title') index 
@endsection
@section('content')
<script>
	$(document).ready(function(){
		$("#menu_options").change(function(){
			var menuid = $("#menu_options").val();
			$.get('AJAXList', {menuid:menuid}, function(data){
				$("#list_options").html(data);
			});
		});
	});

	$(document).ready(function(){
		$("#list_options").change(function(){
			var listid = $("#list_options").val();
			var menuid = $("#menu_options").val();
			$.get('AJAXDish', {listid:listid, menuid:menuid}, function(data){
				$("#dish").html(data);
				console.log(data);
			});
		});
	});
</script>
<select id= "menu_options" name="menu">
	<option value=""> ---------------- </option>
	<option value="all"> All </option>
	@foreach($menus as $menu)	
	<option value="{{$menu->id}}">{{$menu->name}}</option>
	@endforeach
</select>

<select id="list_options" name="list">	
	<option value=""> ---------------- </option>
	<option value=""> All</option>
</select>
<div class="mdl-grid" id="dish"></div>
<!-- <table id="dish">
	<tr>
		<th>Id</th>
		<th>Name</th> 
		<th>Price</th>
	</tr>
	@foreach($dishes as $dish)
	<tr>
		<td>{{$dish->id}}</td>
		<td>{{$dish->name}}</td> 
		<td>{{$dish->price}}</td>
	</tr>
	@endforeach

</table> -->
@endsection