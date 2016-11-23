@extends('layouts.app')

@section('title')
Contact-Us
@stop

@section('content') 
	<h1>Contact Us</h1>	
	{{--dd($company->toArray())--}}
	 {!! Form::open([
        'method'=>'post','files' => true]) !!}
		@include('frontend._msg')
		<button type="submit" class="waves-effect waves-light btn">Continue</button>
	{!! Form::close() !!}
@stop