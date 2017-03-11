@extends('master')
@section('title')
	Login
@endsection

@section('content')
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '395902477431390',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };
	

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   
   function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }
</script>

<div class="mdl-card mdl-shadow--2dp employer-form" action="#">
  <div class="mdl-card__title">
    <h2>Log in</h2>
    <div class="mdl-card__subtitle">Please complete the form</div>
  </div>
  <div class="mdl-card__supporting-text">
    {!! Form::open(['method' => 'POST', 'url' => 'auth/login', 'class' => 'form']) !!}
      <div class="form__article">
        <div class="mdl-grid">
          <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<?php echo Form::text('username','', array('class' => 'mdl-textfield__input')); ?>
			<?php echo Form::label('Username','', array('class' => 'mdl-textfield__label')); ?>
          </div>
        </div>
        <div class="mdl-grid">
          <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<?php echo Form::password('password', array('class' => 'mdl-textfield__input')); ?>
			<?php echo Form::label('Password','', array('class' => 'mdl-textfield__label')); ?>
          </div>
        </div>		
      </div>
	  
      <div class="form__action mdl-grid" style = "margin-top: 20px; height: 80px">
			
				<div class="mdl-cell mdl-cell--5-col">
					<label class="mdl-checkbox mdl-js-checkbox" for="checkbox">
						<input type="checkbox" id="checkbox" class="mdl-checkbox__input">
						<span class="mdl-checkbox__label">  Remember me</span>
					</label>
				</div>
				<div class="mdl-cell mdl-cell--5-col">
					<a href="#">Forget Password</a>
				</div>
				<div class="mdl-cell mdl-cell--2-col">
					<a href="#">Sign up</a>
				</div>
				
				<div class="mdl-cell mdl-cell--12-col">
					<a href="facebook">FB</a>
				</div>
				<div class="mdl-cell mdl-cell--4-col"></div>
				<div class="mdl-cell mdl-cell--4-col">
					<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" id="submit button" style = "width: 213px"> LOG IN </button>
				</div>	
				<div class="mdl-cell mdl-cell--4-col"></div>
	 </div>
		
      </div>
    {!! Form::close() !!}
    <div class="form__article"> </div>
  </div>
</div>

@endsection

