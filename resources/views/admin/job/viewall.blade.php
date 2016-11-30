@extends('layouts.dashboard')

@section('title')
	Job
@stop

@section('content')

	<div class="section-title">
		<h3>All jobs</h3>
		<ul class="bread-crumb">
			<li><a href="/profile">Dashboard</a></li>/
			<li><a href="#">My Job</a></li>/			

		</ul>
	</div>

	<div class="section-content">		
		
		<div class="row">
			@include('admin._flash')
			@if(!count($jobs)>0)
				<h5>You have not created a job yet!</h5>
				<a class="btn" href="{{url('/profile/company/')}}">Create A New Job</a>
			@else
			<ul>
				@foreach($jobs as $job)
					
					<li class="col s12 m4">
						<div class="card">
							<div class="card-image">
								<img src="{{asset('image/'.$job->company->logo)}}" alt="">
							</div>
							{{-- <div class="card-content"> --}}
								<span class="card-title"><a href="{{url('/company/'.$job->company->slug.'/job/'.$job->slug)}}">{{$job->title}}</a></span>

								
							{{-- </div> --}}
								
						</div>
					</li>
			
				@endforeach			
			</ul>
		@endif
		</div>	
		
	</div>

@stop