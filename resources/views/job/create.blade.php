@extends('layouts.dashboard')

@section('content')

<h3>Add New Job</h3>
	 {!! Form::open([
        'action' => ['\App\Http\Controllers\JobsController@store',$id],
        'method'=>'post','files' => true]) !!}
		@include('job._form')
		<button type="submit" class="waves-effect waves-light btn">Continue</button>
	{!! Form::close() !!}

@stop