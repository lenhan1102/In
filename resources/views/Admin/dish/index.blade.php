@extends('Admin.admin-master')
@section('title') index 
<!-- indexDish -->
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
<select id= "menu_options" name="menu">
	<option value=""></option>
	<option value="all"> All </option>
	@foreach($menus as $menu)	
	<option value="{{$menu->id}}">{{$menu->name}}</option>
	@endforeach
</select>

<select id="list_options" name="list">	
	<option value=""></option>
	<option value=""> All </option>
</select>
<div class="mdl-grid" id="dish">
	@foreach($dishes as $dish)
	<div class="mdl-cell mdl-cell--3-col">
		<div class="mdl-card mdl-shadow--4dp">
			<div class="mdl-card__title">
				<div class="mdl-card__title-text">
					Image
				</div>
			</div>
			<div class="mdl-card__media">
			<img src="{{asset('images/catalog/').'/'.$dish->avatar}}" width="100%" height="140" border="0">
			</div>
			<div class="mdl-card__supporting-text">
				Descriptions
			</div>
			<div class="mdl-card__actions">
				<button class="mdl-button mdl-js-button mdl-button--raised">View</button>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection