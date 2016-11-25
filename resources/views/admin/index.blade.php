@extends('layouts.dashboard')

@section('title')
	Dashboard
@stop

@section('content')
	@foreach($companies as $company)
	<div class="company">
		{{$company->name}}
		<img src="{{asset('image/'.$company->logo)}}" alt="">
	</div>

	<div class="training">
		@foreach($company->training as $training)
			
			{{$training->title}}
			
		@endforeach
	</div>

	<div class="job">
		@foreach($company->job as $job)
			
			{{$job->title}}

		@endforeach
	</div>

	@endforeach


	<div class="notification">
		<ul>
			@foreach($notifications as $notification)
				
				<li>
					<a href="{{ url('dashboard/company')}}" class="{{ ($notification->read_at) ?'read': 'notread' }} btn">{{$notification->data['message']}}</a>
				</li>

			@endforeach
		</ul>
	</div>
@stop