@extends('layouts.app')

@section('title')
Homepage
@stop

@section('content') 
	<h1>Frontent Page</h1>	
	@if(Auth::check())
		{{Auth::user()}}
	@endif
@stop