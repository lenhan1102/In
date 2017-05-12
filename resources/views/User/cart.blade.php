@extends('master')

@section('title')
Giỏ hàng
@endsection

@section('content')
<script type="text/javascript">
	$(document).ready(function(){
		$("#delete").click(function(){
			var selected = $(".is-selected").map(function(){
				return this.id;
			}).get();
			if(selected.length){
				$.get("{{route('item.delete')}}", {selected:selected}, function(data){
					console.log(data);
					if (data.badge == 0) {
						$("#cart > div").removeAttr('data-badge');
					} else {
						$("#cart > div").attr('data-badge', data.badge);
					}
					$("#total").html(data.total);
				});
			};
			$(".is-selected").remove();
		});
	});
</script>
<div class="mdl-grid">
	<div class="mdl-cell mdl-cell--3-col"></div>
	<div class="mdl-cell mdl-cell--6-col">
		@if(Session::has('cart'))
		<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" style="width: 100%">
			<thead>
				<tr>
					<th class="mdl-data-table__cell--non-numeric">Tên</th>
					<th>Số lượng</th>
					<th>Đơn giá</th>
					<th>Tính</th>
				</tr>
			</thead>

			<tbody>
				@foreach($products as $product)
				<tr id="{{ $product['item']['id'] }}">
					<td class="mdl-data-table__cell--non-numeric">{{ $product['item']['name'] }}</td>
					<td>{{ $product['qty'] }}</td>
					<td>{{ $product['item']['price'] }}</td>
					<td>{{ $product['qty']* $product['item']['price']}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width: 100%; border-top-color: white 1px;">
			<tbody>
				<tr>
					<td class="mdl-data-table__cell--non-numeric"></td>
					<td></td>
					<td></td>
					<td id="total"><strong>Total: {{ $totalPrice }}</strong></td>
				</tr>
				<tr>
					<td class="mdl-data-table__cell--non-numeric"></td>
					<td></td>
					<td></td>
					<td><button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" id="delete"> Xóa </button></td>
				</tr>
			</tbody>

		</table>

		<div class="mdl-card mdl-shadow--2dp" style="margin-top: 10px ; width: 100%">
			<div class="mdl-card__supporting-text">
				{!! Form::open(['method' => 'get', 'action' => "User\ActionController@getCheckout", 'class' => 'form']) !!}
				{{csrf_field()}}
				
				<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="width: 50%; margin-left: 132px;"> Đặt trước </button>
				
				{!! Form::close() !!}
			</div>
		</div>
		@else

		@endif
	</div>
	<div class="mdl-cell mdl-cell--3-col"></div>
</div>

@endsection