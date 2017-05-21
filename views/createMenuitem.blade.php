@extends('layouts.master')

@section('title')
    Create Menu Item
@stop

@section('content')
<h3>{{ link_to_route('menuitem.index', "Back") }}</h3>
{{-- Form for creating a menuItem --}}
<div class="form">
{{ Form::open(array('action' => 'MenuitemController@store')) }}
    {{ Form::label('name', 'Name: ') }}
    {{ Form::text('name') }}
    {{ $errors->first('name') }}
    <p></p>
    {{ Form::label('price', 'Price: ') }}
    {{ Form::text('price') }}
    {{ $errors->first('price') }}
    <p></p>
    {{ Form::label('details', 'Additional Details: ') }}<br>
    {{ Form::textarea('details') }}
    {{ $errors->first('details') }}
    <p></p>
    {{ Form::submit('Add Item') }}
{{ Form::close() }}
</div>


@stop