@extends('Admin.admin-master')
@section('title') editDish 
@endsection
@section('content')

<script>
	$(document).ready(function(){
		$("#menu_options").change(function(){
			var menuid = $("#menu_options").val();
			$.get('{{route('AJAXListEdit')}}',{menuid:menuid}, function(data){
				$("#list_html").html(data);
				//console.log(data);
			});
		});
	});
</script>



<div class="mdl-card mdl-shadow--2dp employer-form" >
	<div class="mdl-card__title">
		<h2>Update</h2>
		<div class="mdl-card__subtitle">Please complete the form</div>
	</div>
	<div class="mdl-card__supporting-text">
		{!! Form::open(
		array(
		'method' => 'POST',
		'enctype' => 'multipart/form-data',
		'action' => 'Admin\DishController@update',
		'class' => 'form', 
		'novalidate' => 'novalidate', 
		'files' => 'true')) !!}
		<input type="hidden" name="_method" value="PUT">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<div class="form__article">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input hidden type="text" name="id" value="{{$dish->id}}">
					<label for="identify" class="mdl-textfield__label"> ID: {{$dish->id}} </label>
				</div>
			</div>
		</div>
		<div class="form__article">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input hidden type="text" name="name" value="{{$dish->name}}">
					<label for="name" class="mdl-textfield__label"> Name: {{$dish->name}} </label>
				</div>
			</div>
		</div>

		<div class="form__article">
			<div class="mdl-grid">

				<div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
					<label for="menu_options" class="mdl-textfield__label">Menu: {{$cur_menu}} </label>
				</div>

				<div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height" id="list_html">
					<label for="list_options" class="mdl-textfield__label">List: {{$cur_list}}</label>
				</div>
			</div>
		</div>
		<div style="height: 20px">

		</div>
		<div class="form__article">
			<div class="mdl-grid">
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

<div class="mdl-card mdl-shadow--2dp employer-form" >
	<div class="mdl-card__title">
		<h2>Update</h2>
		<div class="mdl-card__subtitle">Please complete the form</div>
	</div>
	<div class="mdl-card__supporting-text">
		<div class="mdl-grid">
			@foreach($images as $image)
			<div class="mdl-cell mdl-cell--6-col">
				<div class="mdl-card mdl-shadow--4dp">
					<div class="mdl-card__media">
						<img src="{{asset('images/catalog/').'/'.$image->link}}" width="100%" height="140" border="0">
					</div>
					<div class="mdl-card__actions">
						<!-- <button class="mdl-button mdl-js-button mdl-button--raised">Delete</button> -->
						<form action="{{route('image.destroy', ['id' => $image->id])}}" method="POST">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<input type="hidden" name="_method" value="PUT">
							<button type="submit">DELETE</button>
						</form>
						@if($image->isAvatar)

						<button class="mdl-button mdl-js-button mdl-button--raised">Unset Avatar</button>
						@endif
						<button class="mdl-button mdl-js-button mdl-button--raised">Set as Avatar</button>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<button id="demo_menu-lower-left" class="mdl-button mdl-js-button mdl-button--icon" data-upgraded=",MaterialButton">
	<i class="material-icons">more_vert</i>
</button>
<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="demo_menu-lower-left">
	<li class="mdl-menu__item">Item #1</li>
	<li class="mdl-menu__item">Item #2</li>
	<li disabled class="mdl-menu__item">Disabled Item</li>     
</ul>
@endsection
