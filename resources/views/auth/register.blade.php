@extends('master')
@section('title')
Register
@endsection

@section('main')
<main class="mdl-layout__content">
  <div class="page_content">
    <div class="mdl-card mdl-shadow--2dp employer-form" action="#" style="margin-bottom: 40px">
      <div class="mdl-card__title">
        <h2>Sign up</h2>
        <div class="mdl-card__subtitle">Please complete the form</div>
      </div>
      <div class="mdl-card__supporting-text">
        {!! Form::open(['method' => 'POST', 'url' => 'auth/register', 'class' => 'form']) !!}
        <div class="form__article">
          <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input type="text" name="name" class="mdl-textfield__input" id="name">
              <label class="mdl-textfield__label" for="name">Name</label>
            </div>

            <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input type="text" name="username" class="mdl-textfield__input" id="username">
              <label class="mdl-textfield__label" for="username">Username</label>
            </div>
          
            <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input type="email" name="email" class="mdl-textfield__input" id="email">
              <label class="mdl-textfield__label" for="email">Email</label>
            </div>
          
            <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input type="password" name="password" class="mdl-textfield__input" id="password">
              <label class="mdl-textfield__label" for="password">Password</label>
            </div>
          
            <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input type="password" name="password_confirmation" class="mdl-textfield__input" id="password_confirmation"">
              <label class="mdl-textfield__label" for="password_confirmation">Confirm password</label>
            </div>
          </div>
        </div>
        <div class="form__action" style="margin-top: 20px">
          <button style="margin: auto; width: 213px;" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" id="submit button sign"> SIGN UP </button>
        </div>
        {!! Form::close() !!}
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
 </div>
</main>
@endsection