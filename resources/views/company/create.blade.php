@extends('layouts.dashboard')
@section('title')
    Company
@stop
@section('content')


	<div class="section-title">
		<h3>Add a Agency</h3>
		<ul class="bread-crumb">
			<li><a href="/profile">Dashboard</a></li>/			
			<li><a href="#">Create Agency</a></li>

		</ul>
	</div>

	<div class="section-content">
		<h5>Agency Details</h5>
		@include('admin._flash')
		<div class="row">
			 {!! Form::open([
		                'action' => '\App\Http\Controllers\Company\CompanyController@store',
		                 'method'=>'post','files' => true]) !!}
				@include('company._form')
				@include('company._contact')
				
				
				<button type="submit" class="waves-effect waves-light btn">Continue</button>
			{!! Form::close() !!}
		</div>
	</div>
@stop






