<div class="mdl-cell mdl-cell--3-col">
	<a href="{{route('action.view', ['id' => $dish->id])}}">
		<div class="mdl-card  dish-card">
			<div class="mdl-card__title">
				<div class="mdl-card__title-text">
					{{$dish->name}}
				</div>
			</div>
			<div class="mdl-card__media">
				<img src="{{asset('images/catalog/').'/'.$dish->id.'/'.$dish->avatar}}" width="100%" height="140" border="0">
			</div>
			<div class="mdl-card__supporting-text">
				{{$dish->description}}
				<br>
				<div style="font-weight: 800; color: #e21010">${{$dish->price}}</div>
				<span class="xstar">{{$dish->rating? $dish->rating : 0}}</span>
			</div>
		</div>
	</a>
</div>
<!-- {{asset('images/catalog/').'/'.$dish->id.'/'.$dish->avatar}} -->