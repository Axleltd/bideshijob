@extends('layouts.dashboard')
@section('title')
    Job
@stop
@section('content')
		@include('admin._flash')


	<div class="section-title">
		<h3>All Jobs</h3>
		<ul class="bread-crumb">
			<li><a href="/profile">Dashboard</a></li>/
			<li><a href="#">All Jobs</a></li>/

		</ul>
	</div>

	<div class="section-content">		
		
		<ul class="row">
			@include('admin._flash')
			@foreach($jobs as $job)
			<li class="col s12 m6">
				<div class="card">
					<div class="card-image">
						<img src="{{asset('image/job/'.$job->image)}}" alt="">
					</div>
					<span class="card-title">
						<a href="{{url('company/'.$job->company->slug.'/job/'.$job->slug)}}">{{$job->title}}</a>
					</span>

					<div class="row">
						<div class="col s12 m4">
							<a href="{{ url('dashboard/job/featured/'.$job->id)}}" class="{{ ($job->featured == 1) ?'disabled': null }} btn" style="font-size: 12px;">Featured</a>
							
						</div>
						<div class="col s12 m4">
							<a href="{{ url('dashboard/job/unfeatured/'.$job->id)}}" class="{{ ($job->featured == 0) ?'disabled': null }} btn" style="font-size: 12px;">UnFeatured</a>
							
						</div>
						<div class="col s12 m4">							
							{!! Form::model($job,[
						                'action' => ['\App\Http\Controllers\admin\JobsController@destroy',$job->id],'method'=>'delete']) !!}				
								<button type="submit" class="waves-effect waves-light red acent-2 btn">Delete</button>
						    {!! Form::close() !!}							
						</div>
				</div>
			</li>

				
				
				
			@endforeach
		</ul>
	</div>

@stop