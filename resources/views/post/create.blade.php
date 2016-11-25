@extends('layouts.dashboard')

@section('content')
	 {!! Form::open([
                'action' => '\App\Http\Controllers\PostsController@store',
                 'method'=>'post','files' => true]) !!}
		@include('post._form')				
		
		<button type="submit" class="waves-effect waves-light btn">Continue</button>
	{!! Form::close() !!}
@stop






