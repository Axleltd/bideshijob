@extends('layouts.dashboard')

@section('title')
	Job
@stop

@section('content')

	<div class="section-title">
		<h3>All jobs</h3>
		<ul class="bread-crumb">
			<li><a href="">Dashboard</a></li>/
			<li><a href="">Blog</a></li>/
			<li><a href="#">Category</a></li>

		</ul>
	</div>

	<div class="section-content">		
		
		<div class="row">
			@if(!count($jobs)>0)
				<h5>You have not created a job yet!</h5>
				<a class="btn" href="{{url('/profile/company/')}}">Create A job</a>
			@else
			<ul>
				@foreach($jobs as $job)
					
					<li>
						<img src="{{asset('image/'.$job->company->logo)}}" alt="">
						{{$job->title}}
					</li>
			
				@endforeach			
			</ul>
		@endif
		</div>	
		
	</div>

@stop