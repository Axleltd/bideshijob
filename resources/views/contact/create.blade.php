@extends('layouts.app')

@section('title')
	Contact Job
@stop

@section('content')
	<div class="col s12 m12">
		{!! Form::open([
			'action'=>['Jobs\ContactController@store',$slug],
			'method' => 'post'
			])
			!!}
			@include('company._contact')
			{!! Form::submit('Submit',['class'=>'btn']) !!}
		{!! Form::close() !!}
</div>
@stop