@extends('layouts.app')

@section('title')
Homepage
@stop

@section('content') 
	<h1>Frontent Page</h1>
	{{dd(diffFromHumans(Carbon::now()))}}		
	<div class="training">		
		@foreach($training as $tr)			
			<h3>{{$tr->title}}</h3>
			<h4>Location:{{$tr->company->contacts->address}}</h4>
			<h4>Duration:{{$tr->to->diff($tr->from)}}</h4>
			<p>{{$tr->description}}</p>
			
		@endforeach
	</div>
@stop