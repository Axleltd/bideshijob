@extends('layouts.dashboard')

@section('title')
	Training
@stop

@section('content')

	<div class="company">
		<ul>
			@foreach($trainings as $training)
				
				<li>
					<img src="{{asset('image/'.$training->company->logo)}}" alt="">
					{{$training->title}}
				</li>
		
			@endforeach
		</ul>
	</div>

@stop