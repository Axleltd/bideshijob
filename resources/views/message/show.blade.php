@extends('layouts.app')

@section('title')
Messages
@stop

@section('content') 
	<h1>Messages</h1>	

			<div class="col s12 m12">	
				<p>Name:{{$message->name}}</p>
				<p>Email: {{ $message->email }}</p>
				<p>Message: {{ $message->messages }}</p>
				<hr>
				@if(Shinobi::isRole('admin'))
				<p> <a href="message/{{$message->id}}/delete" class="btn">Delete</a></p>
				@endif
			</div>

@stop