@extends('layouts.app')

@section('title')
Messages
@stop

@section('content') 
	<h1>Messages</h1>	
	{{--dd($company->toArray())--}}
	@foreach($message as $message)
		<div class="col s12 m12" @if(!$message->seen) style="background:#ccc"  @endif>	
			<p>Name:{{$message->name}}</p>
			<p>Email: {{ $message->email }}</p>
			<p>Message: {{ $message->messages }}</p>
			<hr>
			@if(Shinobi::isRole('admin'))
			<p> <a href="message/{{$message->id}}/delete" class="btn">Delete</a></p>
			@endif
			<p> <a href="message/{{$message->id}}" class="btn">View</a></p>
			@if(!$message->seen)
			<p> <a href="{{ action('MessageController@markSeen',$message->id)}}" class="btn">Mark As Read</a></p>
			@else
			<p> <a href="{{ action('MessageController@markUnSeen',$message->id)}}" class="btn">Mark Unread</a></p>
			@endif
		</div>
	@endforeach
@stop