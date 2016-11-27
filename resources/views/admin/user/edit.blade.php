@extends('layouts.dashboard')

@section('title')
	Edit
@stop

@section('content')
	<div class="section-title">
		<div class="row">
			<h3 class="left">Profile</h3>
			<div class="right">
				@if(!(count($profile)>0))
				
					<a  class="btn" href="{{url('/profile/user/create')}}">Create Profile</a>
				
				@endif
			</div>
		</div>
		<ul class="bread-crumb">
			<li><a href="">Dashboard</a></li>/
			<li><a href="">Profile</a></li>/
		</ul>
	</div>

	<div class="section-content">

		<div class="row">

			<div class="form">
				 {!! Form::model($profile, ['action'=>['\App\Http\Controllers\ProfileController@update',$profile->id],'method'=>'PUT','files' => true]) !!}
					@include('admin.user._form')
					<button type="submit" class="waves-effect waves-light btn">Update</button>
				{!! Form::close() !!}

			</div>
		</div>
	</div>

@stop