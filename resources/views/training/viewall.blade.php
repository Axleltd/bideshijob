@extends('layouts.dashboard')

@section('title')
	Training
@stop

@section('content')

	<div class="section-title">
		<h3>All Trainings</h3>
		<ul class="bread-crumb">
			<li><a href="">Dashboard</a></li>/
			<li><a href="">Blog</a></li>/
			<li><a href="#">Category</a></li>

		</ul>
	</div>

	<div class="section-content">		
		@include('admin._flash')
		<div class="row">
			@if(!count($trainings)>0)
				<h5>You have not created a Training yet!</h5>
				<a class="btn" href="{{url('/profile/company/')}}">Create A New Training</a>
			@else
			<ul>
				@foreach($trainings as $training)
					
					<li class="col s12 m4">
						<div class="card">
							<div class="card-image">
								<img src="{{asset('image/'.$training->company->logo)}}" alt="">
							</div>
							<span class="card-title">
								<a href="{{url('/company/'.$training->company->id.'/training/'.$training->id)}}">{{$training->title}}</a>
							</span>

						
					</li>
			
				@endforeach			
			</ul>
		@endif
		</div>	
		
	</div>

@stop
