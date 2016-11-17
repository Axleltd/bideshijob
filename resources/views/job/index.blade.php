@extends('layouts.app')

@section('title')
	All Jobs
@stop

@section('content')
	
	@foreach($jobs as $job)
		<p>Title {{$job->title}}</p>
	@endforeach
@stop