@extends('layouts.app')

@section('content')
	 {!! Form::model($company, ['action'=>['\App\Http\Controllers\Company\CompanyController@update',$company->id],'method'=>'PUT','files' => true]) !!}
		@include('company._form')
		@include('company._contact')
		<button type="submit" class="waves-effect waves-light btn">Continue</button>
	{!! Form::close() !!}
@stop

