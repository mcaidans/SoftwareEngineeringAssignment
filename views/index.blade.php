@extends('layouts.master')

@section('title')
    Home
@stop

@section('content')
{{-- Link to the Modify Menu state --}}
<h3>{{ link_to_route('menuitem.index', "Edit Menu") }}</h3>
<p></p>
{{ link_to_action('order.viewTakings', 'View Takings') }}

{{--Search For Customer Number --}}
<div class="searchbar">
{{ Form::open(array('url' => 'customer/search')) }}
  {{ Form::text('searchterm') }}
  {{ $errors->first('searchterm') }}
  {{ Form::submit('Find Customer') }}
  
{{ Form::close() }}
</div>
{{-- Displays all orders passed to view --}}
@if($orders)
  @foreach($orders as $order)
  <div class="order">
    <p>Cust Name: {{{ $order->customer->name }}}</p>
    <p>Details: {{{ $order->details }}}</p>
    <p>Total: {{{ $order->ordTotal }}}</p>
    @if($order->delivery === true)
      <p>Delivery</p>
    @else
      <p>Take Away</p>
    @endif
    {{ link_to_route('order.edit', 'View Order', $parameters = array($order->id)) }}
  </div>
  @endforeach
@else
  <p>No Current Orders </p>
@endif



@stop