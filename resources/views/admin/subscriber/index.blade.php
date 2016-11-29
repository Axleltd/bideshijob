@extends('layouts.dashboard')
@section('content')
<h1>Subscribers</h1>
	<div class="company">
		@include('admin._flash')
		@foreach($subscribers as $subscriber)
			
			<h3>{{ $subscriber->name }}</h3>
			<h3>{{ $subscriber->email }}</h3>
			<a href="{{ url('dashboard/subscriber/activate/'.$subscriber->id)}}" class="{{ ($subscriber->status == 1) ?'disabled': null }} btn">Active</a>
			<a href="{{ url('dashboard/subscriber/deactivate/'.$subscriber->id)}}" class="{{ ($subscriber->status == 0) ?'disabled': null }} btn">Suspend</a>			
			{!! Form::model($subscriber,[
		                'action' => ['\App\Http\Controllers\SubscriberController@destroy',$subscriber->id],'method'=>'delete']) !!}				
				<button type="submit" class="waves-effect waves-light btn">Delete</button>
		    {!! Form::close() !!}
			

		@endforeach
	</div>

@stop