@extends('Admin.admin-master')
@section('title') Update List @endsection
@section('content')
<form action="{{route('mlist.update', ['id' => $mlist->id])}}" method="POST">
	<input type="hidden" name="_method" value="PUT">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="text" name="name" id="name" placeholder="{{$mlist->name}}" />
	<label for="name">Name</label>
	<select name="menu_id">
		@foreach($menus as $menu)
		@if($menu->id == $cur_menu->id)
		<option value="{{$menu->id}}" selected>{{$menu->name}}</option>
		@else
		<option value="{{$menu->id}}">{{$menu->name}}</option>
		@endif
		@endforeach
	</select>
	<div class="form__action">
		<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect" type="submit">Update</button>
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