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
			User : {{$job->user->name}}
		</p>
		<p>
			Company : <a href="{{ url('company',$job->company->id)}}">{{$job->company->name}}</a>
		</p>
@stop