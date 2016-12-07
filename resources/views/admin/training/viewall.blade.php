@extends('layouts.dashboard')

@section('title')
	Training
@stop

@section('content')

	<div class="section-title">
		<h3>All Trainings</h3>
		<ul class="bread-crumb">
			<li><a href="/profile">Dashboard</a></li>/
			<li><a href="#">My Training</a></li>/			

		</ul>
	</div>

	<div class="section-content">		
		
		<div class="row">
			@include('admin._flash')
			@if(!count($trainings)>0)
				<h5>You have not created a Training yet!</h5>
				<a class="btn" href="{{url('/profile/company/')}}">Create A New Training</a>
			@else
			<ul>
				@foreach($trainings as $training)
					
					<li class="col s12 m4">
						<div class="card">
							<div class="card-image">
								@if($training->image)
									<img src="{{asset('image/training/'.$training->image)}}" alt="">
								@else
									<img src="{{asset('image/no-image.png')}}" alt="">
								@endif
							</div>
							<span class="card-title">
								<a href="{{url('/company/'.$training->company->slug.'/training/'.$training->slug)}}">{{$training->title}}</a>
							</span>
							<a href="{{url('/company/'.$training->company->slug.'/training/'.$training->slug.'/edit')}}" class="btn">Edit</a>

							<div class="col s12 m4">							
								{!! Form::model($training,[
							                'action' => ['\App\Http\Controllers\TrainingController@destroy',$training->id],'method'=>'delete']) !!}				
									<button type="submit" class="waves-effect waves-light red acent-2 btn">Delete</button>
							    {!! Form::close() !!}	
						    </div>						

						
					</li>
			
				@endforeach			
			</ul>
		@endif
		</div>	
		
	</div>

@stop