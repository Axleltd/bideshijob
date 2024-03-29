@extends('layouts.dashboard')

@section('title')
	Dashboard
@stop

@section('content')

		<div class="section-title">
			<h3>Dashboard</h3>
			<p>Hello {{Auth::user()->name}} Welcome to Dashboard of Bideshikaam.</p>
		</div>

		<div class="section-content">
			<h5>All entries</h5>
			<div class="row">
				<div class="s12 m6 l4 col">
					<div class="card">
						<div class="card-title">Agencies</div>
						<p>{{count($companies)}} Agencies</p>
						<div class="card-action">
							<a href="{{url('/profile/company')}}">View All</a>
						</div>
					</div> 
				</div>
				<div class="s12 m6 l4 col">
					<div class="card">
						<div class="card-title">Jobs</div>
						<p>{{$job_count}} Jobs</p>
						<div class="card-action">
							<a href="{{url('/profile/job')}}">View All</a>
						</div>
					</div> 
				</div>
				<div class="s12 m6 l4 col">
					<div class="card">
						<div class="card-title">Trainings</div>
						<p>{{$training_count}} Trainings</p>
						<div class="card-action">
							<a href="{{url('/profile/training')}}">View All</a>
						</div>
					</div> 
				</div>
			</div>
		</div>

		@if(Shinobi::isRole('admin'))
			<div class="section-content">
				<h5>Edit website</h5>
				<div class="row">
					<div class="col s12 m6 l4">
						<div class="card">
							<div class="card-title">About US</div>
							<p>Information of your organization</p>
							<div class="card-action">
								<a href="">Edit</a>|
								<a href="">View</a>
							</div>
						</div> 
					</div>
					<div class="col s12 m6 l4">
						<div class="card">
							<div class="card-title">FAQ</div>
							<p>Frequently Asked Question</p>
							<div class="card-action">
								<a href="/dashboard/faq">Edit</a>|
								<a href="/dashboard/faq">View</a>
							</div>
						</div> 
					</div>
					<div class="col s12 m6 l4">
						<div class="card">
							<div class="card-title">Blog</div>
							<p>Medical, immigration, insurance posts.</p>
							<div class="card-action">
								<a href="">Edit</a>|
								<a href="">View</a>
							</div>
						</div> 
					</div>
				</div>
			</div>
		@endif








{{-- 
	@foreach($companies as $company)
	<div class="company">
		<a href="">{{$company->name}}</a>
		<img src="{{asset('image/'.$company->logo)}}" alt="">
	</div>

	<div class="training">
		@foreach($company->training as $training)
			
			<a href="">{{$training->title}}</a>
			
		@endforeach
	</div>

	<div class="job">
		@foreach($company->job as $job)
			
			<a href="">{{$job->title}}</a>

		@endforeach
	</div>

	@endforeach --}}


	
@stop