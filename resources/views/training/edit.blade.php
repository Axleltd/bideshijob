@extends('layouts.app')

@section('content')
	 {!! Form::model($training, ['action'=>['\App\Http\Controllers\TrainingController@update',$training->id],'method'=>'PUT']) !!}
		@include('training._form')		
		<button type="submit" class="waves-effect waves-light btn">Continue</button>
	{!! Form::close() !!}
@stop

