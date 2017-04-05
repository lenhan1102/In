@extends('master')
@section('title') editDish 
@endsection
@section('content')

<script>
	$(document).ready(function(){
		$("#menu_options").change(function(){
			var menuid = $("#menu_options").val();
			$.get('{{route('AJAXListEdit')}}',{menuid:menuid}, function(data){
				$("#list_options").html(data);
				//console.log(data);
			});
		});
	});
</script>
{!! Form::open(
	array(
	'method' => 'POST',
	'enctype' => 'multipart/form-data',
	'action' => 'Admin\DishController@store',
	'class' => 'form', 
	'novalidate' => 'novalidate', 
	'files' => 'true')) !!}
	<div class="form-group">
		 <label> {{$dish->id}}</label>
	</div>
	<div class="form-group">
		<label for="name"> Name </label>
		<input type="text" name="name" placeholder={{$dish->name}}>
	</div>
	<div class="form-group">
		<label for="price"> Price </label>
		<input type="text" name="price" placeholder={{$dish->price}}>
	</div>
	<div class="form-group">
		<label> Description </label>
		<input type="text" name="price" placeholder={{$dish->description}}>
	</div>
	<select id= "menu_options" name="menu">
		@foreach($menus as $menu)
		@if($menu->name == $cur_menu)
		<option value="{{$menu->id}}" selected>{{$menu->name}}</option>
		@else	
		<option value="{{$menu->id}}">{{$menu->name}}</option>
		@endif
		@endforeach
	</select>

	<select id="list_options" name="list">	
		@foreach($lists as $list)
		@if($list->name == $cur_list)
		<option value="{{$list->id}}" selected>{{$list->name}}</option>
		@else	
		<option value="{{$list->id}}">{{$list->name}}</option>
		@endif
		@endforeach
	</select>

	<div class="form-group">
		{!! Form::label('Image') !!}
		{!! Form::file('image', null) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Update Product!') !!}
	</div>
{!! Form::close() !!}
@if (count($errors) > 0)
<div class="alert alert-danger" style="color: red; li:{}">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
{!! Form::close() !!}
@endsection