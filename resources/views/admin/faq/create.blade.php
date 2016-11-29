@extends('layouts.dashboard')

@section('content')


	<div class="section-title">
		<h3>Add a FAQ</h3>
		<ul class="bread-crumb">
			<li><a href="/profile">Dashboard</a></li>/			
			<li><a href="#">Create FAQ</a></li>

		</ul>
	</div>

	<div class="section-content">
		<h5>FAQ Details</h5>

		<div class="row">
			 {!! Form::open([
		        'action' => ['\App\Http\Controllers\admin\FAQController@store'],
		        'method'=>'post','files' => true]) !!}
				@include('admin.faq._form')
				<button type="submit" class="waves-effect waves-light btn">Continue</button>
			{!! Form::close() !!}
		</div>
	</div>

@stop