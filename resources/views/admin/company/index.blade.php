@extends('layouts.app')

@section('content')
	
	<div class="company">
		@foreach($company as $com)
			
			<h3>{{$com->name}}</h3>
			<a href="{{ url('dashboard/company/active/'.$com->id)}}" class="{{ ($com->status == 1) ?'disabled': null }} btn">Active</a>
			<a href="{{ url('dashboard/company/suspend/'.$com->id)}}" class="{{ ($com->status == 0) ?'disabled': null }} btn">Suspend</a>
			<a href="{{ url('dashboard/company/delete/'.$com->id)}}" class="btn">Delete</a>

		@endforeach
	</div>

@stop