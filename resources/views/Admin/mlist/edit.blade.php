@extends('Admin.admin-master')
@section('title') Update List @endsection
@section('content')
<div class="mdl-card mdl-shadow--2dp employer-form" action="#" style="margin-bottom: 40px">
	<div class="mdl-card__title">
		<h2>Create new dish</h2>
		<div class="mdl-card__subtitle">Please complete the form</div>
	</div>
	<div class="mdl-card__supporting-text">
		{!! Form::open(
		array(
		'method' => 'POST',
		'enctype' => 'multipart/form-data',
		'action' => 'Admin\MlistController@update',
		'class' => 'form', 
		'novalidate' => 'novalidate', 
		'files' => 'true')) !!}

		<div class="form__article">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input type="text" name="name" class="mdl-textfield__input" value="{{$mlist->name}}" id="name">
					<label class="mdl-textfield__label" for="name">Name</label>
				</div>
				<div class="mdl-cell mdl-cell--6-col">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
						<input class="mdl-textfield__input" type="text" id="menu" value="All" readonly tabIndex="-1">
						<label for="menu">
							<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
						</label>
						<label for="menu" class="mdl-textfield__label">Menu</label>
						<ul for="menu" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
							<li class="mdl-menu__item">All</li>
							@foreach($menus as $menu)
							<li class="mdl-menu__item">{{$menu->name}}</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>


		<select name="menu_id">
			@foreach($menus as $menu)
			@if($menu->id == $cur_menu->id)
			<option value="{{$menu->id}}" selected>{{$menu->name}}</option>
			@else
			<option value="{{$menu->id}}">{{$menu->name}}</option>
			@endif
			@endforeach
		</select>

		<div class="form__action" style="margin-top: 0px;">
			<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" id="submit button sign">Update </button>
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