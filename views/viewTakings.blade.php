@extends('layouts.master')

@section('title')
View Takings
@stop

@section('content')
<p></p>
<h3>View Takings</h3>
@if($sum)
    <p>Takings: {{ $sum }}</p>
@endif
@stop