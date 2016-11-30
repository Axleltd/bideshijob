@extends('layouts.dashboard')

@section('content')

	<div class="section-title">
		<h3>Edit About Us</h3>
		<ul class="bread-crumb">
			<li><a href="/profile">Dashboard</a></li>/
			<li><a href="/dashboard/about">About Us</a></li>/
			<li><a href="#">Edit About Us</a></li>

		</ul>
	</div>

	<div class="section-content">
		<h5>About Us Page Content</h5>
		@include('admin._flash')
		<div class="row">
			 {!! Form::model($about, ['action'=>['\App\Http\Controllers\admin\AboutUsController@update',$about->id],'method'=>'PUT','files' => true]) !!}
				@include('admin.about._form')			
				<button type="submit" class="waves-effect waves-light btn">Continue</button>
			{!! Form::close() !!}
		</div>
	</div>
@stop



