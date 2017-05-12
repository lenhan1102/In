@extends('master')
@section('title') Orders @endsection
@section('content')

<table class="mdl-data-table mdl-js-data-table" width="100%">
	<thead>
		<tr>
			<th class="mdl-data-table__cell--non-numeric">STT</th>
			<th class="mdl-data-table__cell--non-numeric">Khách hàng</th>
			<th class="mdl-data-table__cell--non-numeric">Mặt hàng</th>
			<th class="mdl-data-table__cell--non-numeric">Chuyển tới</th>
			<th class="mdl-data-table__cell--non-numeric">Payment ID</th>
			<th class="mdl-data-table__cell--non-numeric">Trạng thái</th>
		</tr>
	</thead>
	<tbody>
		@foreach($orders as $key => $order)
		<tr>
			<td class="mdl-data-table__cell--non-numeric">{{$key+1}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{App\User::find($order->user_id)->username}}</td>
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
			<td class="mdl-data-table__cell--non-numeric">{{$order->address}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{$order->payment_id}}</td>
			<td class="mdl-data-table__cell--non-numeric">
				<a href="{{route('order.edit', ['id' => $order->id])}}">
					<button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab">
						<i class="material-icons">
							@if ($order->status)
							check
							@else
							
							close
							@endif
						</i>
					</button>
				</a>
				<form action ="{{route('order.destroy')}}" method="POST">
					{{csrf_field()}}
					{{ method_field('DELETE') }}
					<input hidden type="text" name="id" value="{{$order->id}}">
					<button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab">
						<i class="material-icons">delete</i>
					</button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection