@extends('layouts.dashboard')

@section('title')
	Create
@stop

@section('content')
	@include('admin._flash')
	<div class="form">
		{!! Form::open([
                'action' => '\App\Http\Controllers\ProfileController@store',
                 'method'=>'post','files' => true]) !!}
			@include('admin.user._form')
			<button type="submit" class="waves-effect waves-light btn">Create</button>
		{!! Form::close() !!}

	</div>

@stop