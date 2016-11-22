@extends('layouts.app')

@section('title')
	All Jobs
@stop

@section('content')
	<div class="row">
		<div class="col m12 s12">

			@if(Request::url() == url('/jobs'))
				<h3>All Job Information</h3>
			@else
			<h3>Job Information of {{ $company->name}}</h3>
			@endif
		</div>
		@foreach($jobs as $job)
		<div class="col s12 m4">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">{{ $job->title }}</span>
              <p>{{ $job->description }}</p>
            </div>
            <div class="card-action">
              <a href="{{ url('company/'.$job->company->id.'/job/'.$job->id)}}">View More</a>
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>

		@endforeach
	</div>
@stop

		