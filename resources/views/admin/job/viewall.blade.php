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
								@if($job->image)
									<img src="{{asset('image/job/'.$job->image)}}" alt=""
									>
								@else
									<img src="{{asset('image/no-image.png')}}" alt=""
									>
								@endif

							</div>
							
								<span class="card-title"><a href="{{url('/company/'.$job->company->slug.'/job/'.$job->slug)}}">{{$job->title}}</a></span>
								<a href="{{url('/company/'.$job->company->slug.'/job/'.$job->slug.'/edit')}}" class="btn">Edit</a>
								<div class="col s12 m4">							
									{!! Form::model($job,[
								                'action' => ['\App\Http\Controllers\JobsController@destroy',$job->id],'method'=>'delete']) !!}				
										<button type="submit" class="waves-effect waves-light red acent-2 btn">Delete</button>
								    {!! Form::close() !!}							
								</div>
								
							
								
						</div>
					</li>
			
				@endforeach			
			</ul>
		@endif
		</div>	
		
	</div>

@stop