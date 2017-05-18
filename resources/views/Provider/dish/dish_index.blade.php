@extends('master')
@section('title') Dishes
@endsection

@section('content')
<div style="background-color: #4e4e4e;" >
	<a href="{{route('dish.create')}}" >
		<button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" style="position: relative; margin-top: -20px; background-color: #4e4e4e;">
			<i class="material-icons">add</i>
		</button>
	</a>
</div>
<table class="mdl-data-table mdl-js-data-table" style="position: relative; margin-top: 0px; " width="100%">
	<thead>
		<tr>
			<th class="mdl-data-table__cell--non-numeric">STT</th>
			<th class="mdl-data-table__cell--non-numeric">Name</th>
			<th class="mdl-data-table__cell--non-numeric">Price</th>
			<th class="mdl-data-table__cell--non-numeric">Ordered</th>
			<th class="mdl-data-table__cell--non-numeric">Rating</th>
			<th class="mdl-data-table__cell--non-numeric">Description</th>
			<th class="mdl-data-table__cell--non-numeric"></th>
		</tr>
	</thead>
	<tbody>
		@foreach($dishes as $key => $dish)
		<tr>
			<td class="mdl-data-table__cell--non-numeric">{{$key+1}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{$dish->name}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{$dish->price}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{$dish->ordered}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{$dish->rating}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{$dish->description}}</td>
			<td class="mdl-data-table__cell--non-numeric">
				<form action ="{{route('dish.edit', ['id' => $dish->id])}}" method="GET">
					{{csrf_field()}}
					<button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab">
						<i class="material-icons">edit</i>
					</button>
				</form>
				<form action ="{{route('dish.destroy', ['id' => $dish->id])}}" method="POST">
					{{csrf_field()}}
					{{ method_field('DELETE') }}
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