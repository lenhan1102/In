@extends('master')
@section('title') Users 
@endsection

@section('content')
<table class="mdl-data-table mdl-js-data-table mdl-shadow--8dp" width="100%">
	<thead>
		<tr>
			<th class="mdl-data-table__cell--non-numeric">STT</th>
			<th class="mdl-data-table__cell--non-numeric">User</th>
			<th class="mdl-data-table__cell--non-numeric">Email</th>
			<th>Facebook</th>
			<th class="mdl-data-table__cell--non-numeric">Role</th>
			<th class="mdl-data-table__cell--non-numeric"></th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $key => $user)
		<tr>
			<td class="mdl-data-table__cell--non-numeric">{{$key+1}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{$user->username}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{$user->email}}</td>
			<td>{{count($user->social_accounts)? 'Yes' : ""}}</td>
			<td class="mdl-data-table__cell--non-numeric">{{$user->getRole()}}</td>
			<td class="mdl-data-table__cell--non-numeric">
				<form action ="{{route('user.edit', ['id' => $user->id])}}" method="GET">
					{{csrf_field()}}
					<button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab">
						<i class="material-icons">edit</i>
					</button>
				</form>
				<form action ="{{route('user.destroy')}}" method="POST">
					{{csrf_field()}}
					{{ method_field('DELETE') }}
					<input hidden type="text" name="id" value="{{$user->id}}">
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