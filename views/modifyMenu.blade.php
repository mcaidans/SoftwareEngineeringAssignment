@extends('layouts.master')

@section('title')
    ModifyMenu
@stop

@section('content')
<h1> Modify Menu</h1>
<h1>{{ link_to_route('menuitem.create', "Add Item") }}</h1> {{-- Option to create new menuItem --}}

{{-- Displays all menuItems --}}
@if ($menuitems)
    @foreach($menuitems as $menuitem)
    <div class= "order">
        <p>Name: {{{ $menuitem->name }}}</p>
        <p>ID: {{{ $menuitem->id }}}</p>
        <p>Price: {{{ $menuitem->price }}}</p>
        <p>Details: {{{ $menuitem->details }}}</p>
        {{ link_to_route('menuitem.edit', 'Edit Menu Item', $parameters = array($menuitem->id)) }}
        </div>
    @endforeach
@else
    <p>No Menu Items</p>
@endif
@stop