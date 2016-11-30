@extends('layouts.dashboard')

@section('content')


	<div class="section-title">
		<h3>Add a Job</h3>
		<ul class="bread-crumb">
			<li><a href="/profile">Dashboard</a></li>/
			<li><a href="/profile/company">{{$company->name}}</a></li>/
			<li><a href="#">Create Job</a></li>

		</ul>
	</div>

	<div class="section-content">
		<h5>Job Details</h5>

		<div class="row">
			@include('admin._flash')
			 {!! Form::open([
		        'action' => ['\App\Http\Controllers\JobsController@store',$id],
		        'method'=>'post','files' => true]) !!}
				@include('job._form')
				<button type="submit" class="waves-effect waves-light btn">Continue</button>
			{!! Form::close() !!}
		</div>
	</div>

@stop