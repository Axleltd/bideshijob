@extends('layouts.app')

@section('title')
	Job Detail Page
@stop

@section('content')
		<p>
			Title : {{$job->title}}
		</p>
		<p>
			Description : {{$job->description}}
		</p>
		<p>
			User : {{$job->user->name}}
		</p>
		@if($job->company !==null && $job->company->count() > 0)
		<p>
			Company : <a href="{{ url('company',$job->company->id)}}">{{$job->company->name}}</a>  
		</p>
		@endif
		<h4>Contact Information</h4>
		@if($job->contact !==null && $job->contact->count() > 0)
			<div class="row">
				<p>Address:  {{$job->contact->address}}</p>
	            <p>Website: {{ $job->contact->website_link }}</p>
	            <p>Email: {{ $job->contact->email }}</p>
	            @if($job->contact->socialMedia !== null && $job->contact->socialMedia->count() > 0)
		            <p>Facebook: {{ $job->contact->socialMedia->facebook }}</p>
		            <p>Twitter: {{ $job->contact->socialMedia->twitter }}</p>
	            @endif
			</div>
		@else
		<div class="row">
			No Contact Information found
		</div>
		@endif
@stop