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
		
		<div class="row">
			@if(!count($trainings)>0)
				<h5>You have not created a Training yet!</h5>
				<a class="btn" href="{{url('/profile/company/')}}">Create A New Training</a>
			@else
			<ul>
				@foreach($trainings as $training)
					
					<li>
						<img src="{{asset('image/'.$training->company->logo)}}" alt="">
						{{$training->title}}
					</li>
			
				@endforeach			
			</ul>
		@endif
		</div>	
		
	</div>

@stop