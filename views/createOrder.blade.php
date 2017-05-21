@extends('layouts.master')

@if ($customer)

@section('title')
    Create Order
@stop

@section('content')
<h3>Order Open </h3>
<p>Customer: {{{ $customer->name }}}</p>
<p>{{ link_to_route('customer.edit', 'Edit Customer Details', $parameters = array($customer->id)) }}</p>
<br>
{{-- Form to open a new order --}}
<div class="form">
{{ Form::open(array('action' => 'OrderController@store')) }}
    {{ Form::hidden('customer_id', $customer->id) }}
    {{ $errors->first('customer_id') }}
    <p></p>
    {{ Form::label('details', 'Additional Details: ') }}
    {{ Form::text('details') }}
    {{ $errors->first('details') }}
    <p></p>    
    {{ Form::select('delivery', array('true' => 'Delivery', 'false' => 'Take Away'), 'Delivery') }}
    {{ $errors->first('delivery') }}
    <p></p> 
    <div class="btn">
    {{ Form::submit('Create') }}
    </div>
{{ Form::close() }}
</div>

@endif

@stop