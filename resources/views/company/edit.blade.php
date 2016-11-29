@extends('layouts.dashboard')

@section('content')

	<div class="section-title">
		<h3>Edit Agency</h3>
		<ul class="bread-crumb">
			<li><a href="/profile">Dashboard</a></li>/
			<li><a href="{{url('/profile/company')}}">{{$company->name}}</a></li>/
			<li><a href="#">Edit Agency</a></li>

		</ul>
	</div>

	<div class="section-content">
		<h5>Agency Details</h5>

		<div class="row">
			 {!! Form::model($company, ['action'=>['\App\Http\Controllers\Company\CompanyController@update',$company->id],'method'=>'PUT','files' => true]) !!}
				@include('company._form')
				@include('company._contact')		
				<button type="submit" class="waves-effect waves-light btn">Continue</button>
			{!! Form::close() !!}
		</div>
	</div>
@stop



