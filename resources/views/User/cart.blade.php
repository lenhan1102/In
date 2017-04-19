@extends('User.user-master')

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
					if (data == 0) {
						$("#cart > div").removeAttr('data-badge');
					} else {
						$("#cart > div").attr('data-badge', data);
					}
				});
			};
			$(".is-selected").remove();
		});
	});
</script>
<div class="mdl-grid">
	<div class="mdl-cell mdl-cell--3-col"></div>
	<div class="mdl-cell mdl-cell--6-col">

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
				<?php $sum = 0; ?>
				@if($carts != null)
				@foreach ($carts as $key => $cart)
				<tr id="{{$key}}">
					<?php echo $key; ?>
					<td class="mdl-data-table__cell--non-numeric">{{App\Dish::find($key)->name}}</td>
					<td>{{$cart}}</td>
					<td>{{App\Dish::find($key)->price}}</td>
					<td>{{$cart*App\Dish::find($key)->price}}</td>
				</tr>
				<?php $sum += $cart*App\Dish::find($key)->price; ?>
				@endforeach
				@endif
			</tbody>
		</table>
		<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width: 100%; border-top-color: white 1px;">
			<tbody>
				<tr>
					<td class="mdl-data-table__cell--non-numeric"></td>
					<td></td>
					<td></td>
					<td>{{$sum}}</td>
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
				{!! Form::open(['method' => 'POST', 'url' => '#', 'class' => 'form']) !!}
				<div class="form__action" style="margin-top: 0px;">
					<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="width: 50%; margin: auto"> Đặt trước </button>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	<div class="mdl-cell mdl-cell--3-col"></div>
</div>

@endsection