@extends('layouts.dashboard')

@section('content')


	<div class="section-title">
		<h3>Add a Training</h3>
		<ul class="bread-crumb">
			<li><a href="">Dashboard</a></li>/
			<li><a href="">Company Name</a></li>/
			<li><a href="#">Create training</a></li>

		</ul>
	</div>

	<div class="section-content">
		<h5>Training Details</h5>

		<div class="row">

			{!! Form::model($company, ['action'=>['\App\Http\Controllers\TrainingController@store',$company->id],'method'=>'POST']) !!}
				@include('training._form')
				<button type="submit" class="waves-effect waves-light btn">Continue</button>
			{!! Form::close() !!}
		</div>
	</div>
@stop

