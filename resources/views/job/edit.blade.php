@extends('layouts.app')

@section('content')

<h3>Edit Job Details</h3>	
	 {!! Form::model($job,[
        'action' => ['\App\Http\Controllers\JobsController@update',$job->company_id,$job->id],
        'method'=>'put','files' => true]) !!}
		@include('job._form')
		<button type="submit" class="waves-effect waves-light btn">Continue</button>
	{!! Form::close() !!}


@stop