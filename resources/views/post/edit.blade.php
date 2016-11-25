@extends('layouts.dashboard')

@section('content')
	 {!! Form::model($post, ['action'=>['\App\Http\Controllers\PostsController@update',$post->slug],'method'=>'PUT','files' => true]) !!}
		@include('post._form')				
		<button type="submit" class="waves-effect waves-light btn">Continue</button>
	{!! Form::close() !!}
@stop



