@extends('master')
@section('title')
Login
@endsection

@section('main')
<main class="mdl-layout__content">
	<div class="page_content">
		<div class="mdl-card mdl-shadow--2dp employer-form" action="#">
			<div class="mdl-card__title">
				<h2>Log in</h2>
				<div class="mdl-card__subtitle">Please complete the form</div>
			</div>
			<div class="mdl-card__supporting-text">
				{!! Form::open(['method' => 'POST',  'action' => 'Auth\AuthController@postLogin', 'class' => 'form']) !!}
				<div class="form__article">
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input type="text" name="email" class="mdl-textfield__input" id="email">
							<label class="mdl-textfield__label" for="email">Email</label>
						</div>
					</div>
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input type="password" name="password" class="mdl-textfield__input" id="password">
							<label class="mdl-textfield__label" for="password">Password</label>
						</div>
					</div>		
				</div>
				
				<div class="form__action mdl-grid" style = "margin-top: 20px;">
					<div class="mdl-cell mdl-cell--5-col">
						<label class="mdl-checkbox mdl-js-checkbox" for="checkbox">
							<input type="checkbox" id="checkbox" class="mdl-checkbox__input" name="remember_token">
							<span class="mdl-checkbox__label">Remember me</span>
						</label>
					</div>
					<div class="mdl-cell mdl-cell--5-col">
						<a href="#">Forget Password</a>
					</div>
					<div class="mdl-cell mdl-cell--2-col">
						<a href="register">Sign up</a>
					</div>
					<div class="mdl-cell mdl-cell--12-col" style="height: 20px"></div>
					<div class="mdl-cell mdl-cell--4-col"></div>
					<div class="mdl-cell mdl-cell--4-col" style="margin-top: 10px; margin: auto;">
						<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" id="submit button" style = "width: 213px;"> LOG IN </button>
					</div>
					<div class="mdl-cell mdl-cell--4-col"></div>
					<div class="mdl-cell mdl-cell--4-col"></div>
					<div class="mdl-cell mdl-cell--4-col" style="margin-top: 10px; margin-bottom: 10px">
						<a href="{{route('facebook')}}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--facebook" style = "width: 213px;">
							<i class="material-icons"></i>
							Facebook
						</a>
					</div>	
					<div class="mdl-cell mdl-cell--4-col"></div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</main>
@endsection

