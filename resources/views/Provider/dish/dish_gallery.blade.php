@extends('master')
@section('title') Gallery
@endsection

@section('content')
<div class="mdl-card mdl-shadow--2dp employer-form full-width" style="margin-top: 0px; background-color: white">
	<div class="mdl-card__title" style="color: black">
		<h2 style="color: black">Images</h2>
	</div>
	<div class="mdl-card__supporting-text">
		<div class="mdl-grid">
			@if(count($images) > 0)
			@foreach($images as $image)
			<div class="mdl-cell mdl-cell--3-col">
				<div class="mdl-card mdl-shadow--4dp">
					<div class="mdl-card__media">
						<img src="{{asset('images/catalog/').'/'.$image->link}}" width="100%" height="150">
					</div>
					
					<div class="mdl-card__menu">
						<button id="{{$image->id}}" class="mdl-button mdl-js-button mdl-button--icon">
							<i class="material-icons">more_vert</i>
						</button>

						<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="{{$image->id}}" style="background-color: white; width: 100px;">
							<li class="mdl-menu__item" onclick="window.location='{{route('image.destroy', ['id' => $image->id])}}'">Delete</li>
							@if($image->isAvatar)
							<li class="mdl-menu__item" onclick="window.location='{{route('image.unset', ['id' => $image->id])}}'">Unset Avatar</li>
							@else
							<li class="mdl-menu__item" onclick="window.location='{{route('image.set', ['id' => $image->id])}}'">Set as Avatar</li>
							@endif
							
							
						</ul>
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