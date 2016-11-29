@extends('layouts.app')

@section('title')
FAQ
@stop

@section('content') 
	<h1>FAQ</h1>	
	{{--dd($company->toArray())--}}
	@foreach($faq as $faq)
			<div class="col s12 m12">	
				<p>Question:{{$faq->question}}</p>
				<p>Answer: {{ $faq->answer }}</p>								
			</div>
	@endforeach
@stop