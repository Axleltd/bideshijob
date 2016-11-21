@extends('layouts.app')

@section('title')
	Contact Job
@stop

@section('content')
	<div class="col s12 m12">
		{!! Form::model($job->contact,[
			'action'=>['Jobs\ContactController@update',$slug,$id],
			'method' => 'put'
			])
			!!}
			@include('company._contact')
			{!! Form::submit('Submit',['class'=>'btn']) !!}
		{!! Form::close() !!}
</div>
@stop