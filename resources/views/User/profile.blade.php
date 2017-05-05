@extends('User.user-master')
@section('title') Profile
@endsection

@section('content')
<div class="mdl-card mdl-shadow--2dp employer-form" action="#" style="margin-bottom: 40px">
	<div class="mdl-card__title">
		<h2>Update Profile</h2>
		<div class="mdl-card__subtitle">Update Profile</div>
	</div>
	<div class="mdl-card__supporting-text">
		{!! Form::open(
		array(
		'method' => 'POST',
		'enctype' => 'multipart/form-data',
		'action' => 'User\ActionController@postProfile',
		'class' => 'form', 
		'novalidate' => 'novalidate', 
		'files' => 'true')) !!}
		@include('partials._messages')

		<input type="text" name="id" class="mdl-textfield__input" id="id" value='{{Auth::user()->id}}' hidden="">
		<div class="form__article">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input type="text" name="name" class="mdl-textfield__input" id="name" value="{{Auth::user()->name}}">
					<label class="mdl-textfield__label" for="name">Name</label>
				</div>
			</div>
		</div>

		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
				<input class="mdl-textfield__input" value="{{Auth::user()->gender}}" type="text" id="gender" readonly tabIndex="-1"/>
				<label class="mdl-textfield__label" for="gender">Gender</label>
				<ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu dark_dropdown" for="gender">
					<li class="mdl-menu__item">Male</li>
					<li class="mdl-menu__item">Female</li>
				</ul>
				<label for="gender"> <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i> </label>
			</div>
		</div>

		<div class="form__article">
		<div class="mdl-cell mdl-cell--6-col input-group"> <i class="material-icons pull-left">place</i>
				<div class="mdl-textfield mdl-js-textfield pull-left">
					<input class="mdl-textfield__input" type="text" id="address" value="{{Auth::user()->address}}"/>
					<label class="mdl-textfield__label" for="address"></label>
				</div>
			</div>
		</div>

		<div class="form__article">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col input-group"> <i class="material-icons pull-left">call</i>
					<div class="mdl-textfield mdl-js-textfield pull-left">
						<input class="mdl-textfield__input" type="text" id="phone" value="{{Auth::user()->phone}}">
						<label class="mdl-textfield__label" for="phone"></label>
					</div>
				</div>
			</div>
		</div>

		<div class="form__article">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<label class="mdl-textfield__label" for="file">Avatar</label>
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
	</div>
</div>
{!! Form::close() !!}
@endsection