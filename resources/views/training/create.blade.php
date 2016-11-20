@extends('layouts.app')

@section('content')
	 {!! Form::model($company, ['action'=>['\App\Http\Controllers\TrainingController@store',$company->id],'method'=>'POST']) !!}
		@include('training._form')
		<button type="submit" class="waves-effect waves-light btn">Continue</button>
	{!! Form::close() !!}
@stop

