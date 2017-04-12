@extends('Admin.admin-master')
@section('title') Index Dish
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
<div class="mdl-grid" style="margin: 0px 20px">
	<div class="mdl-cell mdl-cell--10-col">
		<select id="menu_options" name="menu">
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
	</div>
	<div class="mdl-cell mdl-cell--2-col">
		<a href="{{route('dish.create')}}">
			<button class="mdl-button mdl-js-button mdl-button--raised">
				Add new
			</button>
		</a>
	</div>
</div>


<div class="mdl-grid" style="margin: 0px 0px" id="dish">
	@foreach($dishes as $dish)
	<div class="mdl-cell mdl-cell--3-col">
		<div class="mdl-card mdl-shadow--4dp">
			<div class="mdl-card__title">
				<div class="mdl-card__title-text">
					Image
				</div>
			</div>
			<div class="mdl-card__media">
				<!-- if default, get, else get file from dishid folder -->
				<img src="{{asset('images/catalog/').'/'.$dish->avatar}}" width="100%" height="140" border="1">
				
			</div>
			<div class="mdl-card__supporting-text">
				Descriptions
			</div>
			<div class="mdl-card__actions mdl-grid">
				<div class="mdl-cell mdl-cell--3-col">
					<form action="{{route('dish.edit', ['id' => $dish->id])}}" method="get">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<button type="submit" class="mdl-button mdl-js-button mdl-button--raised">Edit</button>
					</form>
				</div>
				<div class="mdl-cell mdl-cell--3-col">
					<form action="{{route('dish.destroy', ['id' => $dish->id])}}" method="POST">
						<input type="hidden" name="_method" value="DELETE">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<button type="submit" class="mdl-button mdl-js-button mdl-button--raised">Delete</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection