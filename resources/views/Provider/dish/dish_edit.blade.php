@extends('master')
@section('title') Edit Dish
@endsection

@section('content')

<div class="mdl-card mdl-shadow--2dp employer-form full-width">
	<div class="mdl-card__title" style="color: white">
		<h2>Update</h2>
	</div>
	<div class="mdl-card__supporting-text" style="color: white">
		@include('partials._messages')
		{!! Form::open(
		array(
		'method' => 'POST',
		'enctype' => 'multipart/form-data',
		'action' => 'Provider\DishController@update',
		'class' => 'form', 
		'novalidate' => 'novalidate', 
		'files' => 'true')) !!}
		<input type="hidden" name="_method" value="PUT">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<div class="form__article">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<b style="color:white">ID:</b>
					{{$dish->id}} 
				</div>
			</div>
		</div>
		<div class="form__article">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<b style="color:white"> Name: </b> {{$dish->name}}
				</div>
			</div>
		</div>

		<div class="form__article">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
					<b style="color:white"> Menu: </b> {{$cur_menu}} 
				</div>
			</div>
		</div>
		<div style="height: 20px">
		</div>
		<div class="form__article">
			<div class="mdl-grid">
				<input hidden type="text" name="id" id="id" value='{{$dish->id}}'>
				<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<label class="mdl-textfield__label" for="price"> Price </label>
					<input type="text" name="price" id="price" class="mdl-textfield__input" value='{{$dish->price}}'>
				</div>
			</div>
		</div>
		<div class="form__article">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<label class="mdl-textfield__label" for="price"> Description </label>
					<input type="text" name="description" class="mdl-textfield__input" id="price" value='{{$dish->description}}'>
				</div>
			</div>
		</div>
		<div class="form__article">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<label class="mdl-textfield__label" for="file"> File </label>
					<input type="file" name="image" class="mdl-textfield__input" id="file">
				</div>
			</div>
		</div>

		<div class="form__action" style="margin-top: 0px;">
			<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" id="submit button sign"> Update </button>
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
	</div>
</div>


@endsection
