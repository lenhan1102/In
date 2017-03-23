@extends('master')
@section('content')
{!! Form::open(
	array(
	'action' => 'Admin\DishController@store',
	'class' => 'form', 
	'method' => 'POST',
	'novalidate' => 'novalidate', 
	'files' => true)
	) 
!!}
{!! Form::open(
    array(
        'action' => 'Admin\DishController@store',
        'class' => 'form', 
        'novalidate' => 'novalidate', 
        'files' => true)) !!}

<div class="form-group">
    {!! Form::label('Product Name') !!}
    {!! Form::text('name', null, array('placeholder'=>'Chess Board')) !!}
</div>

<div class="form-group">
    {!! Form::label('Product Image') !!}
    {!! Form::file('image', null) !!}
</div>

<div class="form-group">
    {!! Form::submit('Create Product!') !!}
</div>
{!! Form::close() !!}
</div>
<!--
	<div class="mdl-card mdl-shadow--2dp employer-form">
		<div class="mdl-card__title">
			<h2>Add a dish</h2>
		</div>
		<div class="mdl-card__supporting-text">
			<div class="">
				{!! Form::label('Product Name') !!}
				{!! Form::text('name', null, array('placeholder'=>'Chess Board')) !!}
			</div>

			<div class="">
				{!! Form::label('Product SKU') !!}
				{!! Form::text('sku', null, array('placeholder'=>'1234')) !!}
			</div>

			<div class="">
				{!! Form::label('Product Image') !!}
				{!! Form::file('image', null) !!}
			</div>

			<div class="">
				{!! Form::submit('Create Product!') !!}
			</div>
		</div>
	</div>
-->	
	{!! Form::close() !!}
@endsection('content')