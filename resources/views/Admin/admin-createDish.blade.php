@extends('master')
@section('content')
{!! Form::open(
	array(
	'method' => 'POST',
	'enctype' => 'multipart/form-data',
	'action' => 'Admin\DishController@store',
	'class' => 'form', 
	'novalidate' => 'novalidate', 
	'files' => 'true')) !!}

	<div class="form-group">
		{!! Form::label('Name') !!}
		{!! Form::text('name', null, array('placeholder'=>'')) !!}
	</div>
	<div class="form-group">
		{!! Form::label('Price') !!}
		{!! Form::text('price', null, array('placeholder'=>'')) !!}
	</div>
	<div class="form-group">
		{!! Form::label('Description') !!}
		{!! Form::text('description', null, array('placeholder'=>'')) !!}
	</div>
	<select id= "menu_options" name="menu">
		<option value="">Select Menu to add new dish</option>
		@foreach($menus as $menu)	
		<option value="{{$menu->id}}">{{$menu->name}}</option>
		@endforeach
	</select>

	<select id="list_options" name="list">	
		<option></option>
	</select>

	<div class="form-group">
		{!! Form::label('Image') !!}
		{!! Form::file('image', null) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Create Product!') !!}
	</div>
	<div id="test"></div>
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
</div>

<script>
	$(document).ready(function(){
		$("#menu_options").change(function(){
			var menuid = $("#menu_options").val();
			$.get('{{route('AJAXList')}}', {menuid:menuid}, function(data){
				$("#list_options").html(data);
				//console.log(data);
			});
		});
	});
</script>
{!! Form::close() !!}
@endsection('content')