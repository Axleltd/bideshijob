@extends('layouts.dashboard')
@section('content')
	<div class="section-title">
		<div class="row">
			<h3 class="left">Training</h3>			
		</div>
		<ul class="bread-crumb">
			<li><a href="">Dashboard</a></li>/
			<li><a href="">Training</a></li>/
		</ul>
	</div>

	<div class="section-content">

		<div class="row">

			<div class="training">
				@include('admin._flash')
				@foreach($trainings as $training)
					
					<a href="{{url('company/'.$training->company_id.'/training/'.$training->id)}}"><h3>{{$training->title}}</h3></a>
					<img src="{{asset('image/'.$training->company->logo)}}" alt="">
					<a href="{{ url('dashboard/training/featured/'.$training->id)}}" class="{{ ($training->featured == 1) ?'disabled': null }} btn">Featured</a>
					<a href="{{ url('dashboard/training/unfeatured/'.$training->id)}}" class="{{ ($training->featured == 0) ?'disabled': null }} btn">UnFeatured</a>
					<a href="{{ url('dashboard/training/delete/'.$training->id)}}" class="btn">Delete</a>

				@endforeach
			</div>
		</div>
		<div class="row">
			<h5>You have not created a training yet!</h5>
			<a class="btn" href="#">Create A Training</a>
		</div>	
	</div>

@stop