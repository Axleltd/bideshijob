@extends('layouts.dashboard')

@section('title')
	Edit
@stop

@section('content')
		<div class="form">
		 {!! Form::model($profile, ['action'=>['\App\Http\Controllers\ProfileController@update',$profile->id],'method'=>'PUT','files' => true]) !!}
			@include('admin.user._form')
			<button type="submit" class="waves-effect waves-light btn">Update</button>
		{!! Form::close() !!}

	</div>

@stop