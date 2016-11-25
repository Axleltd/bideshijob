@extends('layouts.dashboard')

@section('content')

	<div class="section-title">
		<h3>Edit Post</h3>
		<ul class="bread-crumb">
			<li><a href="">Dashboard</a></li>/
			<li><a href="">Company Name</a></li>/
			<li><a href="#">Edit Post</a></li>

		</ul>
	</div>

	<div class="section-content">
		<h5>Post Details</h5>

		<div class="row">
			 {!! Form::model($post, ['action'=>['\App\Http\Controllers\PostsController@update',$post->slug],'method'=>'PUT','files' => true]) !!}
				@include('post._form')				
				<button type="submit" class="waves-effect waves-light btn">Continue</button>
			{!! Form::close() !!}
		</div>
	</div>
@stop



