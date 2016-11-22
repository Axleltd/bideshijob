@extends('layouts.app')

@section('content')

<h3>Edit New FAQ</h3>
	 {!! Form::model($faq,[
        'action' => ['\App\Http\Controllers\FAQController@update',$faq->id],
        'method'=>'put']) !!}
		@include('admin.faq._form')
		<button type="submit" class="waves-effect waves-light btn">Continue</button>
	{!! Form::close() !!}

@stop