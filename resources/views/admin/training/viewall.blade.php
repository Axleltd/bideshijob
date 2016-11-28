@extends('layouts.dashboard')

@section('title')
	Training
@stop

@section('content')

	<div class="company">
		<div class="row">
			@if(!count($trainings)>0)
			<h5>You have not created a training yet!</h5>
			<a class="btn" href="#">Create A Training</a>
			@else
			<ul>
				@foreach($trainings as $training)
					
					<li>
						<img src="{{asset('image/'.$training->company->logo)}}" alt="">
						{{$training->title}}
					</li>
			
				@endforeach			
			</ul>
		@endif
		</div>	
		
	</div>

@stop