@extends('layouts.app')

@section('title')
	All Jobs
@stop

@section('content')
	
	@foreach($jobs as $job)
		<p>Title 
			<a href="{{ url('job/'.$job->id)}}">
				{{$job->title}}
			</a>
		</p>
	@endforeach
@stop