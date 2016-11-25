@extends('layouts.dashboard')

@section('title')
	Job
@stop

@section('content')

	<div class="company">
		<ul>
			@foreach($jobs as $job)
				
				<li>
					<img src="{{asset('image/'.$job->company->logo)}}" alt="">
					{{$job->title}}
				</li>
		
			@endforeach
		</ul>
	</div>

@stop