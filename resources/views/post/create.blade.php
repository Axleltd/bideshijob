@extends('layouts.dashboard')

@section('content')



	<div class="section-title">
		<h3>Add a Post</h3>
		<ul class="bread-crumb">
			<li><a href="">Dashboard</a></li>/
			<li><a href="">Company Name</a></li>/
			<li><a href="#">Create Post</a></li>

		</ul>
	</div>

	<div class="section-content">
		<h5>Post Details</h5>

		<div class="row">
			 {!! Form::open([
		                'action' => '\App\Http\Controllers\PostsController@store',
		                 'method'=>'post','files' => true]) !!}
				@include('post._form')				
				
				<button type="submit" class="waves-effect waves-light btn">Continue</button>
			{!! Form::close() !!}
		</div>
	</div>
@stop






