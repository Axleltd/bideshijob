@extends('layouts.app')

@section('content')
	 {!! Form::open([
                'action' => '\App\Http\Controllers\TrainingController@store',
                 'method'=>'post']) !!}
		@include('training._form')
		<button type="submit" class="waves-effect waves-light btn">Continue</button>
	{!! Form::close() !!}
@stop

