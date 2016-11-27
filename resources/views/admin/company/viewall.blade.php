@extends('layouts.dashboard')

@section('title')
	Company
@stop

@section('content')
		
	<div class="section-title">
		<h3>All Company</h3>
		<ul class="bread-crumb">
			<li><a href="">Dashboard</a></li>/
			<li><a href="">Blog</a></li>/
			<li><a href="#">Category</a></li>

		</ul>
	</div>

	<div class="company">
		@if(!count($companies)>0)
				<h5>You have not created a company yet!</h5>
				<a class="btn" href="{{url('/company/create')}}">Create A Company</a>
		@else
			<ul>
				@foreach($companies as $company)
					
					<li>
						<img src="{{asset('image/'.$company->logo)}}" alt="">
						<h5>{{$company->name}}</h5>
						<a href="{{url('/company/'.$company->id.'/job/create')}}" class="btn">Create a new job</a>
						<a href="{{url('/company/'.$company->id.'/training/create')}}" class="btn">Create a new training</a>
					</li>
			
				@endforeach
			</ul>
		@endif			
	</div>

@stop