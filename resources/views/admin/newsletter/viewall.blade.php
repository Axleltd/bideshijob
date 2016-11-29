@extends('layouts.dashboard')

@section('title')
	Newsletter
@stop

@section('content')
		
	<div class="section-title">
		<h3>All Newsletter</h3>
		<ul class="bread-crumb">
			<li><a href="">Dashboard</a></li>/
			<li><a href="">Newsletter</a></li>/
			

		</ul>
	</div>

	<div class="company">
		@if(!count($newsletters)>0)
				<h5>You have not created a newsletter yet!</h5>
				<a class="btn" href="{{url('/newsletter/create')}}">Create A New Newsletter</a>
		@else
			<ul>
				@foreach($newsletters as $newsletter)
					
					<li>
						<img src="{{asset('image/'.$newsletter->logo)}}" alt="">
						<h5>{{$newsletter->title}}</h5>
						<h5>{{$newsletter->published_on}}</h5>
						<a href="{{url('/newsletter/'.$newsletter->id.'/edit')}}" class="btn">Edit</a>
						<a href="{{url('/newsletter/'.$newsletter->id.'/training/create')}}" class="btn">Create a new training</a>
					</li>
			
				@endforeach
			</ul>
		@endif			
	</div>

@stop