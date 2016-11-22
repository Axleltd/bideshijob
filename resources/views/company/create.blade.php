@extends('layouts.app')

@section('content')
	 {!! Form::open([
                'action' => '\App\Http\Controllers\Company\CompanyController@store',
                 'method'=>'post','files' => true]) !!}
		@include('company._form')
		@include('company._contact')
		
		
		<button type="submit" class="waves-effect waves-light btn">Continue</button>
	{!! Form::close() !!}
@stop






