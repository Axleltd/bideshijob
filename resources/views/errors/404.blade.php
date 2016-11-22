@extends('layouts.login')

@section('content')
	<h1>404 Error</h1>
	<a href="{{ URL::previous() }}">Go Back</a>

@stop