@extends('layouts.app')

@section('content')

<h3>Add New FAQ</h3>
	 {!! Form::open([
        'action' => ['\App\Http\Controllers\FAQController@update'],
        'method'=>'post','files' => true]) !!}
		@include('admin.faq._form')
		<button type="submit" class="waves-effect waves-light btn">Continue</button>
	{!! Form::close() !!}

@stop