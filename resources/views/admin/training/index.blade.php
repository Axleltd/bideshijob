@extends('layouts.dashboard')
@section('content')
	<div class="section-title">
		<div class="row">
			<h3 class="left">Training</h3>			
		</div>
		<ul class="bread-crumb">
			<li><a href="/profile">Dashboard</a></li>/
			<li><a href="#">All Training</a></li>/
		</ul>
	</div>

				@include('admin._flash')
	<div class="section-content">

		<ul class="row">
		@foreach($trainings as $training)
			<li class="col s12 m6">
				<div class="card">
					<div class="card-image">
						<img src="{{asset('image/'.$training->company->logo)}}" alt="">
					</div>
					<span class="card-title">
						<a href="{{url('company/'.$training->company_id.'/training/'.$training->id)}}">{{$training->title}}</a>
					</span>

					<div class="row">
						<div class="col s12 m4">
							<a href="{{ url('dashboard/training/featured/'.$training->id)}}" class="{{ ($training->featured == 1) ?'disabled': null }} btn"  style="font-size: 12px;">Featured</a>
							
						</div>
						<div class="col s12 m4">
							<a href="{{ url('dashboard/training/unfeatured/'.$training->id)}}" class="{{ ($training->featured == 0) ?'disabled': null }} btn"  style="font-size: 12px;">UnFeatured</a>
							
						</div>
						<div class="col s12 m4">
							<a href="{{ url('dashboard/training/delete/'.$training->id)}}" class="btn red accent-2"  style="font-size: 12px; float: right;">Delete</a>
							
						</div>
					</div>
				</div>
			</li>

					
					
					
					
					
					

				@endforeach
		</div>		
	</div>

@stop