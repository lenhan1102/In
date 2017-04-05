@extends('master')
@section('title') Create List @endsection
@section('content')
<form action="{{route('mlist.store')}}" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="text" name="name" id="name" />
	<label for="name">Name</label>
	<select name="menu_id">
		@foreach($menus as $menu)
		<option value="{{$menu->id}}">{{$menu->name}}</option>
		@endforeach
	</select>
	<div class="form__action">
		<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect" type="submit">Create</button>
	</div>
</form>
@if (count($errors) > 0)
<div class="alert alert-danger" style="color: red; li:{}">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
@endsection