@extends('master')
@section('title') New dish 
@endsection
@section('content')
<div class="mdl-card mdl-shadow--2dp employer-form full-width" style="background-color: #4e4e4e">
	<div class="mdl-card__title">
		<h2>Create new dish</h2>
	</div>
	<div class="mdl-card__supporting-text">
		{!! Form::open(
		array(
		'method' => 'POST',
		'enctype' => 'multipart/form-data',
		'action' => 'Provider\DishController@store',
		'class' => 'form', 
		'novalidate' => 'novalidate', 
		'files' => 'true')) !!}
		@include('partials._messages')

		<div class="form__article">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input type="text" name="name" class="mdl-textfield__input" id="name">
					<label class="mdl-textfield__label" for="name">Name</label>
				</div>
			</div>
		</div>

		<div class="form__article">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input type="text" name="price" class="mdl-textfield__input" id="price">
					<label class="mdl-textfield__label" for="price">Price</label>
				</div>
			</div>
		</div>

		<div class="form__article">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input type="text" name="description" class="mdl-textfield__input" id="description">
					<label class="mdl-textfield__label" for="description">Description</label>
				</div>
			</div>
		</div>


		<select id= "menu_options" name="menu">
			<option value="">Select Menu to add new dish</option>
			@foreach($menus as $menu)	
			<option value="{{$menu->id}}">{{$menu->name}}</option>
			@endforeach
		</select>

		<div class="form__article">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<label class="mdl-textfield__label" for="file"></label>
					<input type="file" name="image" class="mdl-textfield__input" id="file">
				</div>
			</div>
		</div>

		<div class="form__action" style="margin-top: 0px;">
			<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" id="submit button sign">Create </button>
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
	</div>
</div>
<script>
	$(document).ready(function(){
		$("#menu_options").change(function(){
			var menuid = $("#menu_options").val();
			$.get('{{route('AJAXList')}}', {menuid:menuid}, function(data){
				$("#list_options").html(data);
			});
		});
	});
</script>
{!! Form::close() !!}
@endsection