@extends('master')
@section('title') 
History
@endsection
@section('content')
<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width: 100%">
	<thead>
		<tr>
			<th>STT</th>
			<th>Payment ID</th>
			<th>Địa chỉ</th>
			<th>Thời gian</th>
			<th>Mặt hàng</th>
			<th>Tổng</th>
		</tr>
	</thead>

	<tbody>
		@foreach($orders as $key => $order)
		<tr>
			<td>{{$key+1}}</td>
			<td>{{$order->payment_id}}</td>
			<td>{{$order->address}}</td>
			<td>{{$order->updated_at}}</td>
			<td>
				<ul class="demo-list-item mdl-list">
					@foreach($order->cart->items as $item)
					<li class="mdl-list__item">
						<span class="mdl-chip">
							<span class="mdl-chip__text">{{$item['qty']}}</span>
						</span>
						<span class="mdl-list__item-primary-content">
							{{$item['item']['name']}}
						</span>
						<span class="mdl-list__item-secondary-content mdl-chip">
							<span class="mdl-chip__text">
								{{$item['price']}}
							</span>
						</span>
					</li>
					@endforeach
				</ul>
			</td>
			<td>
				<span class="mdl-chip">
					<span class="mdl-chip__text">{{ $order->cart->totalPrice }}</span>
				</span>
			</td>

		</tr>
		@endforeach
	</tbody>
</table>
@endsection