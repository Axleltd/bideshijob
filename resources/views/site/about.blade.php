@extends('layouts.app')

@section('title')
	@lang('site.about')
@stop

@section('content')
 
	<div class="page-inside page-about">
		<div class="banner">
	    	<div class="wrap">
				<h3 class="wow fadeIn">@lang('site.about') US</h3>
			</div>
		</div>				
		<section>
			<div class="section-content">				
				@if($about)
					<img src="{{asset('image/about/'.$about->image)}}" alt="" width="300" height="300">
					<p>{!!$about->content!!}</p>
				@endif					
				
			</div>
		</section>
	</div>
@stop