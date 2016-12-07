@extends('layouts.app')

@section('title')
FAQ
@stop

@section('content') 
	<div class="page-inside page-faq">
		<div class="banner">
	    	<div class="wrap">
	        	<h3>FAQ</h3>
			</div>

		</div>
		<section class="page-content faqs">

			<div class="wrap row">
				<div class="col s12 m10 offset-m1">
					<ul class="collapsible" data-collapsible="accordion">
						@foreach($faq as $faq)
						    <li>
						      <div class="collapsible-header"><i class="material-icons">filter_drama</i>{{$faq->question}}</div>
						      <div class="collapsible-body"><p>{{ $faq->answer }}</p></div>
						    </li>
						@endforeach
					</ul>
				</div>
			</div>
		</section>
	</div>
@stop