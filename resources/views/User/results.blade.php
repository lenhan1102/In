@extends('master')
@section('title')
Results
@endsection

@section('script')
<script type="text/javascript">
	$.fn.xstar = function() {
		return $(this).each(function() {
			$(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * 16));
		});
	}
	$(function() {
		$('span.xstar').xstar();
	});

</script>
@endsection

@section('content')
@include('partials._messages')
<div style="color: black; padding-top: 10px;"><center><strong>Tổng {{$hits}} kết quả trong {{$took}} milliseconds</strong></center></div>
<div class="mdl-grid">
	<!-- Cards -->
	@foreach($dishes as $dish)
	@include('partials._dishcard')
	@endforeach
</div>

@endsection