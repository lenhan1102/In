@extends('master')
@section('title') Dishes
@endsection



@section('content')
<button type="submit" class="mdl-button mdl-js-button mdl-button--icon" onclick="window.location='{{route('dish.create')}}'">
	<i class="material-icons">add</i>
</button>
<table class="mdl-data-table mdl-js-data-table" style="position: relative; margin-top: 0px; " width="100%">
	<thead style="color: black">
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
			<td class="mdl-data-table__cell--non-numeric" style="font-weight: 400;">{{$dish->name}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{$dish->price}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{$dish->ordered}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{$dish->rating}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{$dish->description}}</td>
			<td class="mdl-data-table__cell--non-numeric">
				
			<button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" onclick="window.location='{{route('dish.edit', ['id' => $dish->id])}}'" style="background-color: #d28313">
					<i class="material-icons">edit</i>
				</button>
				
				
				<button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" onclick="window.location='{{route('dish.destroy', ['id' => $dish->id])}}'" style="background-color: #d28313">
					<i class="material-icons">delete</i>
				</button>

				<button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" onclick="window.location='{{route('dish.gallery', ['id' => $dish->id])}}'" style="background-color: #d28313">
					<i class="material-icons">perm_media</i>
				</button>
			</td>
		</tr>
		@endforeach

	</tbody>
</table>
@endsection