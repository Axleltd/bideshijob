@extends('layouts.app')

@section('title')
	Contact Job
@stop

@section('content')


	<div class="section-title">
		<h3>Add Contact</h3>
		<ul class="bread-crumb">
			<li><a href="">Dashboard</a></li>/
			<li><a href="">Company Name</a></li>/
			<li><a href="#">Create Contact</a></li>

		</ul>
	</div>

	<div class="section-content">
		<h5>Contact Details</h5>

		<div class="row">
			{!! Form::open([
				'action'=>['Jobs\ContactController@store',$slug],
				'method' => 'post'
				])
				!!}
				@include('company._contact')
				{!! Form::submit('Submit',['class'=>'btn']) !!}
			{!! Form::close() !!}
		</div>
	</div>
@stop