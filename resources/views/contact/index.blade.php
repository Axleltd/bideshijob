@extends('layouts.app')

@section('title')
	Contact Details
@stop

@section('content')
	<div class="col s12 m12">
		 @if($job->contact !==null && $job->contact->count() > 0)
       <p> {{ $job->contact->address }} </p>
       <p> {{ $job->contact->website_link }} </p>
       <p> {{ $job->contact->email }} </p>
            @if($job->contact->socialMedia !==null && $job->contact->socialMedia->count() > 0)
                
                <p> {{$job->contact->socialMedia->facebook }} </p>
                <p> {{ $job->contact->socialMedia->twitter}} </p>
            
            <a href="{{url('job/'.$job->id.'/contact/'.$job->contact->id.'/edit') }}"> Click Here to Edit</a>
        	@endif
        @else

       <p> No result found create a new one </p>
        <a href="{{url('job/'.$job->id.'/contact/create')}}"> Click Here to Create</a>
        @endif
       
	</div> 
@stop