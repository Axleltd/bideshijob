@extends('layouts.app')

@section('title')
	All Jobs
@stop

@section('content')
	<div class="row">
		@foreach($jobs as $job)
			<div class="col s12 m12">	
				<p>Title 
					<a href="{{ url('job/'.$job->id)}}">
						{{$job->title}}
					</a>
				</p>
				<p>Description: {{ $job->description }}</p>
			</div>
		@endforeach
	</div>
@stop