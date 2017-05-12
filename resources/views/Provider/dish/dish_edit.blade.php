@extends('master')
@section('title') Edit Dish
@endsection

@section('content')


<script>
	$(document).ready(function(){
		$("#menu_options").change(function(){
			var menuid = $("#menu_options").val();
			$.get('{{route('AJAXListEdit')}}',{menuid:menuid}, function(data){
				$("#list_html").html(data);
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

<div class="mdl-card mdl-shadow--2dp employer-form" >
	<div class="mdl-card__title">
		<h2>Update Image</h2>
		<div class="mdl-card__subtitle">Please complete the form</div>
	</div>
	<div class="mdl-card__supporting-text">
		<div class="mdl-grid">
			@if(count($images) > 0)
			@foreach($images as $image)
			<div class="mdl-cell mdl-cell--6-col">
				<div class="mdl-card mdl-shadow--4dp">
					<div class="mdl-card__media">
						<img src="{{asset('images/catalog/').'/'.$image->link}}" width="100%" height="150">
				</div>
				<div class="mdl-card__actions">
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--6-col">
							<form action="{{route('image.destroy', ['id' => $image->id])}}" method="POST">
								<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
								<input type="hidden" name="_method" value="PUT">
								<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Delete</button>
							</form>
						</div>
						<div class="mdl-cell mdl-cell--6-col">
							@if($image->isAvatar)
							<form action="{{route('image.unset', ['id' => $image->id])}}" method="POST">
								<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
								<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"> Unset</button>
							</form>
							@else
							<form action="{{route('image.set', ['id' => $image->id])}}" method="GET">
								<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
								<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Set</button>
							</form>
							@endif
						</div>
					</div>					
				</div>
			</div>
		</div>
		@endforeach
		@else
		This dish hasn't had any images 
		@endif
	</div>
</div>
</div>
@endsection
