@extends('layouts.master')

@section('title')
    Edit Customer
@stop

@section('content')
<h3>Edit Customer</h3>
<div class = "form">
{{ Form::model($customer, array('method' => 'PUT', 'route' => array('customer.update', $customer->id))) }}
    {{ Form::label('name', 'Name: ') }}
    {{ Form::text('name') }}
    {{ $errors->first('name') }}
    <p></p>
    {{ Form::label('address', 'Address: ') }}
    {{ Form::text('address') }}
    {{ $errors->first('address') }}
    <p></p>
    {{ Form::label('phoneNo', 'Phone Number: ') }}
    {{ Form::text('phoneNo') }}
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
    {{ Form::submit('Update Customer') }}
    </div>
{{ Form::close() }}

{{ Form::model($customer, array('method' => 'PUT', 'route' => array('customer.update', $customer->id))) }}
    {{ Form::hidden('name') }}
    {{ Form::hidden('address') }}
    {{ Form::hidden('phoneNo') }}
    {{ Form::hidden('cardNo') }}
    {{ Form::hidden('expDate') }}
    {{ Form::hidden('cardName') }}
    {{ Form::hidden('secCode') }}
    <div class="btn">
    {{ Form::submit('Cancel') }}
    </div>
{{ Form::close() }}
</div>
@stop