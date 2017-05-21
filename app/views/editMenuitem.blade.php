@extends('layouts.master')

@section('content')

<h3>{{ link_to_route('menuitem.index', "Back") }}</h3>

{{-- Form to edit a menuItem --}}
<div class="form">
{{ Form::model($menuitem, array('method' => 'PUT', 'route' => array('menuitem.update', $menuitem->id))) }} 
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
    {{ Form::submit('Update') }}
{{ Form::close() }} 

{{-- Button to delete a menuItem --}}
<div class="btnleft">
{{ Form::open(array('method' => 'DELETE', 'route' => array('menuitem.destroy', $menuitem->id))) }}
    {{ Form::submit('Delete Menu Item') }}
{{ Form::close() }}
</div>
</div>



@stop