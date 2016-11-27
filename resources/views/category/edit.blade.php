@extends('layouts.dashboard')

@section('content')
	 {!! Form::model($category, ['action'=>['\App\Http\Controllers\CategoriesController@update',$category->slug],'method'=>'PUT','files' => true]) !!}
		@include('category._form')				
		<button type="submit" class="waves-effect waves-light btn">Submit</button>
	{!! Form::close() !!}
@stop



