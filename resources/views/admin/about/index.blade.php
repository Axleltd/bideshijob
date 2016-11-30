@extends('layouts.dashboard')
@section('content')


	<div class="section-title">
		<div class="row">
			<h3 class="left">About Us</h3>
		</div>
		<ul class="bread-crumb">
			<li><a href="/profile">Dashboard</a></li>/
			<li><a href="#">About Us</a></li>/
		</ul>
	</div>

	<div class="section-content">

		<div class="row">
		@include('admin._flash')
		<ul>
			@if($about)			
			<li><a href="/dashboard/about/edit" class="btn">Edit</a></li>
			{!! Form::model($about,[
		                'action' => ['\App\Http\Controllers\admin\AboutUsController@destroy',$about->id],'method'=>'delete']) !!}				
				<button type="submit" class="waves-effect waves-light btn">Delete</button>
		    {!! Form::close() !!}
			<li>{{$about->content}}</li>
			@endif
		</ul>

	</div>

@stop