@extends('layouts.app')

@section('title')
	Contact Job
@stop

@section('content')
	<div class="section-title">
		<h3>Edit Contact</h3>
		<ul class="bread-crumb">
			<li><a href="">Dashboard</a></li>/
			<li><a href="">Company Name</a></li>/
			<li><a href="#">Edit Contact</a></li>

		</ul>
	</div>

	<div class="section-content">
		<h5>Contact Details</h5>

		<div class="row">
			@include('admin._flash')
			{!! Form::model($job->contact,[
				'action'=>['Jobs\ContactController@update',$slug,$id],
				'method' => 'put'
				])
				!!}
				@include('company._contact')
				{!! Form::submit('Submit',['class'=>'btn']) !!}
			{!! Form::close() !!}
		</div>
	</div>
@stop