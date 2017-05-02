@extends('index')
@section('name')
Results
@endsection
@section('content')
<div class="mdl-grid">
	<!-- Cards -->
	
	@foreach($results as $result)
	<div class="mdl-cell mdl-cell--3-col">
		<div class="mdl-card mdl-shadow--4dp">
			<div class="mdl-card__title">
				<div class="mdl-card__title-text">
					{{$result->name}}
				</div>
			</div>
			<div class="mdl-card__media">
				<img src="{{asset('images/catalog/').'/'.$result->avatar}}" width="100%" height="140" border="0">
			</div>
			<div class="mdl-card__supporting-text">
				{{$result->description}}
			</div>
			<div class="mdl-card__actions">
				<form action="{{route('action.view', ['id' => $result->id])}}" method="GET">
					{{ csrf_field() }}
					<button type="submit" class="mdl-button mdl-js-button mdl-button--raised">View</button>
				</form>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection