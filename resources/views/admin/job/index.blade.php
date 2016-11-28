@extends('layouts.dashboard')
@section('content')
		@include('admin._flash')


	<div class="section-title">
		<h3>All Trainings</h3>
		<ul class="bread-crumb">
			<li><a href="">Dashboard</a></li>/
			<li><a href="">Blog</a></li>/
			<li><a href="#">Category</a></li>

		</ul>
	</div>

	<div class="section-content">		
		
		<ul class="row">
			@foreach($jobs as $job)
			<li class="col s12 m6">
				<div class="card">
					<div class="card-image">
						<img src="{{asset('image/'.$job->company->logo)}}" alt="">
					</div>
					<span class="card-title">
						<a href="{{url('company/'.$job->company_id.'/job/'.$job->id)}}">{{$job->title}}</a>
					</span>

					<div class="row">
						<div class="col s12 m4">
							<a href="{{ url('dashboard/job/featured/'.$job->id)}}" class="{{ ($job->featured == 1) ?'disabled': null }} btn" style="font-size: 12px;">Featured</a>
							
						</div>
						<div class="col s12 m4">
							<a href="{{ url('dashboard/job/unfeatured/'.$job->id)}}" class="{{ ($job->featured == 0) ?'disabled': null }} btn" style="font-size: 12px;">UnFeatured</a>
							
						</div>
						<div class="col s12 m4">
							<a href="{{ url('dashboard/job/delete/'.$job->id)}}" class="btn" style="font-size: 12px;">Delete</a>
							
						</div>
					</div>
				</div>
			</li>

				
				
				
			@endforeach
		</ul>
	</div>

@stop