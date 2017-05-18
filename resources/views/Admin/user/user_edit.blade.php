@extends('master')
@section('title') 
Edit user
@endsection
@section('content')
<div class="mdl-card mdl-shadow--2dp employer-form full-width normal-form" >
	<div class="mdl-card__title">
		<h2>Update</h2>
		<div class="mdl-card__subtitle"></div>
	</div>
	<div class="mdl-card__supporting-text">
		{!! Form::open(
		array(
		'method' => 'POST',
		'enctype' => 'multipart/form-data',
		'action' => 'Admin\UserController@update',
		'class' => 'form', 
		'novalidate' => 'novalidate', 
		'files' => 'true')) !!}

		{{ method_field('PUT') }}
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input type="hidden" name="id" value="{{$user->id}}">
		@include('partials._messages')
		<div class="form__article">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<label class="mdl-textfield__label" for="username"> Username </label>
					<input type="text" name="username" id="username" class="mdl-textfield__input" value='{{$user->username}}'>
				</div>
			</div>
		</div>
		<div class="form__article">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<label class="mdl-textfield__label" for="email"> Email </label>
					<input type="text" name="email" id="email" class="mdl-textfield__input" value='{{$user->email}}'>
				</div>
			</div>
		</div>
		<div class="form__article">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
					<input class="mdl-textfield__input" name="role" value="{{Auth::user()->gender}}" type="text" id="gender" readonly tabIndex="-1"/>
					<label class="mdl-textfield__label" for="gender">Gender</label>
					<ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu dark_dropdown" for="gender">
						<li class="mdl-menu__item">Male</li>
						<li class="mdl-menu__item">Female</li>
					</ul>
					<label for="gender"> <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i> </label>
				</div>
			</div>
		</div>
		<div class="form__article">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col">
					<label class="mdl-checkbox mdl-js-checkbox" for="User">
						<input type="checkbox" id="User" class="mdl-checkbox__input" name="User"
						{{$user->hasRole('User')? 'checked' : ''}} >
						<span class="mdl-checkbox__label"> User</span>
					</label>
					<label class="mdl-checkbox mdl-js-checkbox" for="Provider">
						<input type="checkbox" id="Provider" class="mdl-checkbox__input" name="Provider"
						{{$user->hasRole('Provider')? 'checked' : ''}}>
						<span class="mdl-checkbox__label"> Provider</span>
					</label>
					<label class="mdl-checkbox mdl-js-checkbox" for="Admin">
						<input type="checkbox" id="Admin" class="mdl-checkbox__input" name="Admin"
						{{$user->hasRole('Admin')? 'checked' : ''}}>
						<span class="mdl-checkbox__label"> Admin</span>
					</label>
				</div>
			</div>
		</div>
		<div class="form__action" style="margin-top: 0px;">
			<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit"> Update </button>
		</div>
	</div>
	

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
@endsection