@extends('layouts.dashboard')
@section('content')
	<div class="job">
		@include('admin._flash')
		@foreach($jobs as $job)
			
			<a href="{{url('company/'.$job->company_id.'/job/'.$job->id)}}"><h3>{{$job->title}}</h3></a>
			<img src="{{asset('image/'.$job->company->logo)}}" alt="">
			<a href="{{ url('dashboard/job/featured/'.$job->id)}}" class="{{ ($job->featured == 1) ?'disabled': null }} btn">Featured</a>
			<a href="{{ url('dashboard/job/unfeatured/'.$job->id)}}" class="{{ ($job->featured == 0) ?'disabled': null }} btn">UnFeatured</a>
			<a href="{{ url('dashboard/job/delete/'.$job->id)}}" class="btn">Delete</a>

		@endforeach
	</div>

@stop