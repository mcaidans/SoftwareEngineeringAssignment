@extends('layouts.master')

@section('title')
    New Customer
@stop

@section('content')
<h3>New Customer</h3>
{{-- Form to create a new customer --}}
<div class = "form">
{{ Form::open(array('action' => 'CustomerController@store')) }}
    {{ Form::label('name', 'Name: ') }}
    {{ Form::text('name') }}
    {{ $errors->first('name') }}
    <p></p>
    {{ Form::label('address', 'Address: ') }}
    {{ Form::text('address') }}
    {{ $errors->first('address') }}
    <p></p>
    {{ Form::label('phoneNo', 'Phone Number: ') }}
    {{ Form::text('phoneNo', $searchterm) }}
    {{ $errors->first('phoneNo') }}
    <p></p>
    {{ Form::label('cardNo', 'Card Number: ') }}
    {{ Form::text('cardNo') }}
    {{ $errors->first('cardNo') }}
    <p></p>
    {{ Form::label('expDate', 'Expiry Date: ') }}
    {{ Form::text('expDate') }}
    {{ $errors->first('expDate') }}
    <p></p>
    {{ Form::label('cardName', 'Cardholder Name: ') }}
    {{ Form::text('cardName') }}
    {{ $errors->first('cardName') }}
    <p></p>
    {{ Form::label('secCode', 'Security Code: ') }}
    {{ Form::text('secCode') }}
    {{ $errors->first('secCode') }}
    <p></p>
    <div class="btn">
    {{ Form::submit('Create Customer') }}
    </div>
{{ Form::close() }}
</div>
@stop