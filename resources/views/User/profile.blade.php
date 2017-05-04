@extends('User.user-master')
@section('title') Profile
@endsection

@section('content')
<div style="height: 350px; background-color: white; border-color: rgba(45, 43, 43, 0.48); color: black; width: 80%; margin: auto; margin-top: 40px" class="mdl-grid mdl-shadow--8dp">
	<div class="mdl-cell mdl-cell--6-col">
	<img class="mySlides" src='{{$user->avatar}}' style="width: 100%; height: 100%">
	</div>
	<div class="mdl-cell mdl-cell--6-col mdl-grid" >
		<div class="mdl-cell mdl-cell--12-col">
			<h2 style="margin-top: 0px; font-size:35px;">{{$user->username}}</h2>

			<p style="font-size:16px; white-space: pre-line;line-height: normal;">{{$user->email}}
			</p>
			<p style="font-size:16px; white-space: pre-line;line-height: normal;">{{$user->address}}
			</p>
			<p style="font-size:16px; white-space: pre-line;line-height: normal;">{{$user->phone}}
			</p>
		</div>

		<div  class="mdl-cell mdl-cell--2-col">
			<button id="add" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored" value=""> Thêm</button> 
		</div>
	</div>
</div>
@endsection