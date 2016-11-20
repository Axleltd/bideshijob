@extends('layouts.app')

@section('title')
	Job Detail Page
@stop

@section('content')
		<p>
			Title : {{$job->title}}
		</p>
		<p>
			Description : {{$job->description}}
		</p>
		<p>
			User : {{$job->user_id}}
		</p>
@stop