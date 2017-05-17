@extends('master')
@section('title')
Results
@endsection

@section('content')
<div style="color: white;"><center><strong>Tổng {{$hits}} kết quả</strong></center></div>
<div class="mdl-grid">
	<!-- Cards -->
	@foreach($results as $result)
	<div class="mdl-cell mdl-cell--3-col">
		<div class="mdl-card">
			<div class="mdl-card__title">
				<div class="mdl-card__title-text">
					{{$result->name}}
				</div>
			</div>
			<div class="mdl-card__media">
				<img src="{{asset('images/catalog/').'/'.$result->avatar}}" width="100%" height="140" border="0">
			</div>
			<a class="mdl-card__supporting-text" href="{{route('action.view', ['id' => $result->id])}}">
			{{$result->description}}
			</a>
		</div>
	</div>
	@endforeach
</div>

@endsection