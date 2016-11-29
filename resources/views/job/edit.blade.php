@extends('layouts.dashboard')

@section('content')
	<div class="section-title">
		<h3>Edit Job</h3>
		<ul class="bread-crumb">
			<li><a href="/profile/company">Dashboard</a></li>/
			<li><a href="/profile/company">{{$job->company->name}}</a></li>/
			<li><a href="#">Edit Job</a></li>

		</ul>
	</div>

	<div class="section-content">
		<h5>Job Details</h5>

		<div class="row">
			 {!! Form::model($job,[
		        'action' => ['\App\Http\Controllers\JobsController@update',$job->company_id,$job->id],
		        'method'=>'put','files' => true]) !!}
				@include('job._form')
				<button type="submit" class="waves-effect waves-light btn">Continue</button>
			{!! Form::close() !!}
		</div>
	</div>


@stop