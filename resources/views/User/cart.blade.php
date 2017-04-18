@extends('User.user-master')

@section('title')
Giỏ hàng
@endsection

@section('content')
<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" style="margin:auto;">
	<thead>
		<tr>
			<th class="mdl-data-table__cell--non-numeric">Tên</th>
			<th>Số lượng</th>
			<th>Đơn giá</th>
			<th>Tính</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($carts as $key => $cart)
		@if($cart != 0)
		<tr>
			<td class="mdl-data-table__cell--non-numeric">{{App\Dish::find($key)->name}}</td>
			<td>{{$cart}}</td>
			<td>{{App\Dish::find($key)->price}}</td>
			<td>{{$cart*App\Dish::find($key)->price}}</td>
		</tr>
		@endif
		@endforeach
	</tbody>
</table>
@endsection