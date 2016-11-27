@extends('layouts.app')
@section('content')
	<div class="company">
		@include('admin._flash')
		@foreach($company as $com)
			
			<a href="{{url('/company/'.$com->id)}}"><h3>{{$com->name}}</h3></a>
			<img src="{{asset('image/'.$com->logo)}}" alt="">
			<a href="{{ url('dashboard/company/active/'.$com->id)}}" class="{{ ($com->status == 1) ?'disabled': null }} btn">Active</a>
			<a href="{{ url('dashboard/company/suspend/'.$com->id)}}" class="{{ ($com->status == 0) ?'disabled': null }} btn">Suspend</a>			
			{!! Form::model($com,[
		                'action' => ['\App\Http\Controllers\admin\CompanyController@destroy',$com->id],'method'=>'delete']) !!}				
				<button type="submit" class="waves-effect waves-light btn">Delete</button>
		    {!! Form::close() !!}
			

		@endforeach
	</div>

@stop