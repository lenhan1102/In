@extends('master')
@section('content')
{!! Form::open(
	array(
	'method' => 'POST',
	'enctype' => 'multipart/form-data',
	'action' => 'Admin\DishController@create',
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
	<select id= "menu_options" name="menu_options">
		<option value="">Select Menu to add new dish</option>
		@foreach($menus as $menu)	
		<option value="{{$menu->id}}">{{$menu->name}}</option>
		@endforeach
	</select>

	<select id="list_options" name="list_options">	
		<option> ------------ </option>
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
</div>

<script>
	$(document).ready(function(){
		$("#menu_options").change(function(){
			var menuid = $("#menu_options").val();
			$.get('updateList', {menuid:menuid}, function(data){
				$("#list_options").html(data);
				//console.log(data);
			});
		});
	});
</script>
<!--
	<div class="mdl-card mdl-shadow--2dp employer-form">
		<div class="mdl-card__title">
			<h2>Add a dish</h2>
		</div>
		<div class="mdl-card__supporting-text">
			<div class="">
				{!! Form::label('Product Name') !!}
				{!! Form::text('name', null, array('placeholder'=>'Chess Board')) !!}
			</div>

			<div class="">
				{!! Form::label('Product SKU') !!}
				{!! Form::text('sku', null, array('placeholder'=>'1234')) !!}
			</div>
			<div class="">
				{!! Form::label('Product Image') !!}
				{!! Form::file('image', null) !!}
			</div>

			<div class="">
				{!! Form::submit('Create Product!') !!}
			</div>
		</div>
	</div>
-->	
{!! Form::close() !!}
@endsection('content')