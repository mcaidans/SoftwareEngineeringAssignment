@extends('layouts.master')

@section('title')
    Order Open
@stop

@section('content')
<p>Order Open</p>
<h3>{{ link_to_route('order.index', "Confirm Order") }}</h3>
@if($order)
<div class="btnleft">
{{ Form::open(array('method' => 'DELETE', 'route' => array('order.destroy', $order->id))) }}
    {{ Form::submit('Cancel Order') }}
{{ Form::close() }}
</div>

<p>Total Price: {{{ $order->ordTotal }}} </p>
<div class="form">
{{ Form::model($order, array('method' => 'POST', 'route' => array('order.additem', $order->id))) }}
    {{ Form::label('menuitem_id', 'Item Number: ') }}
    {{ Form::text('menuitem_id') }}
    {{ $errors->first('menuitem_id') }}
    <p></p>
    {{ Form::label('quantity', 'Quantity: ') }}
    {{ Form::selectRange('quantity', 1, 10); }}
    {{ $errors->first('quantity') }}
    <p></p>
    <div class="btn">
    {{ Form::submit('Add Item') }}
    </div>
{{ Form::close() }}
</div>
<p></p>
@foreach($order->menuitems as $menuitem)
    <div class="order">
        <div class="item">Name: {{{ $menuitem->name }}}</div>
        <div class="item">Quantity: {{{ $menuitem->pivot->quantity }}}</div>
        <div class="item">Price: {{{ $menuitem->pivot->totalPrice }}}</div>
        {{ Form::model($menuitem->pivot, array('method' => 'DELETE', 'route' => array('order.removeitem', $order->id))) }}
            {{ Form::hidden('menuitem_id') }}
            {{ Form::hidden('totalPrice') }}
            {{ Form::submit('Delete Item') }}
        {{ Form::close() }}
        <p></p>
    </div>
@endforeach
@endif
@stop