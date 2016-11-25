@extends('layouts.dashboard')

@section('title')
	
@stop

@section('content')



	<div class="section-title">
		<h3>Add a Category</h3>
		<ul class="bread-crumb">
			<li><a href="">Dashboard</a></li>/
			<li><a href="">Blog</a></li>/
			<li><a href="#">Category</a></li>

		</ul>
	</div>

	<div class="section-content">
		<h5>Category Details</h5>

		<div class="row">
			 {!! Form::open([
		                'action' => '\App\Http\Controllers\PostsController@store',
		                 'method'=>'post','files' => true]) !!}
				@include('category._form')				
				
				<button type="submit" class="waves-effect waves-light btn">Continue</button>
			{!! Form::close() !!}
		</div>
	</div>
@stop






