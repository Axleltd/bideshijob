@extends('layouts.dashboard')

@section('content')

	<div class="section-title">
		<h3>Edit Training</h3>
		<ul class="bread-crumb">
			<li><a href="/profile">Dashboard</a></li>/
			<li><a href="/profile/company">{{$training->company->name}}</a></li>/
			<li><a href="#">Edit training</a></li>

		</ul>
	</div>

	<div class="section-content">
		<h5>Training Details</h5>

		<div class="row">
			 {!! Form::model($training, ['action'=>['\App\Http\Controllers\TrainingController@update',$training->company->slug,$training->slug],'method'=>'PUT']) !!}
				@include('training._form')		
				<button type="submit" class="waves-effect waves-light btn">Continue</button>
			{!! Form::close() !!}
		</div>
	</div>
@stop