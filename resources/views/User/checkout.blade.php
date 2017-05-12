@extends('master')

@section('title')
Checkout
@endsection

@section('content')
<div class="mdl-card mdl-shadow--2dp employer-form" style="margin-bottom: 40px">
	<div class="mdl-card__title">
		<h2>Checkout! Your Total: ${{ $total }}</h2>
		<div class="mdl-card__subtitle">
			<div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}">{{ Session::get('error') }}
			</div>
		</div>
	</div>
	<div class="mdl-card__supporting-text">
		<form action="{{ route('checkout') }}" method="post" id="checkout-form" class="form">
			<div class="form__article">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input type="text" class="mdl-textfield__input" id="name" name="name" 
						required>
						<label class="mdl-textfield__label" for="name">Name</label>
					</div>

					<div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input type="text" class="mdl-textfield__input" id="address" name="address" required>
						<label class="mdl-textfield__label" for="address">Address</label>
					</div>

					<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input type="text" class="mdl-textfield__input" id="card-name" required>
						<label class="mdl-textfield__label" for="card-name">Card Holder Name</label>
					</div>

					<div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input type="text" class="mdl-textfield__input" id="card-number" required>
						<label class="mdl-textfield__label" for="card-number">Credit Card Number</label>
					</div>
					<div class="mdl-cell mdl-cell--6-col">
					</div>


					<div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input type="text" class="mdl-textfield__input" id="card-expiry-month" required>
						<label class="mdl-textfield__label" for="card-expiry-month">Expiration Month</label>
					</div>
					<div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input type="text" class="mdl-textfield__input" id="card-expiry-year" required>
						<label class="mdl-textfield__label" for="card-expiry-year">Expiration Year</label>
					</div>
					<div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input type="text" class="mdl-textfield__input" id="card-cvc" required>
						<label class="mdl-textfield__label" for="card-cvc">CVC</label>
					</div>
					<div class="mdl-cell mdl-cell--6-col">
					</div>
					{{ csrf_field() }}
					
				</div>
				<div class="form__action" style="margin-top: 20px">
					<button style="margin: auto; width: 213px;" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"> Buy now </button>
				</div>
			</div>
		</form>
		@if (count($errors) > 0)
		<div class="alert alert-danger" style='color: red; li:{}'>
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>

</div>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="{{ URL::to('src/js/checkout.js') }}"></script>
@endsection

