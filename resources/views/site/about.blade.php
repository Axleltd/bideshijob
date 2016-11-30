@extends('layouts.app')

@section('title')
	@lang('site.about')
@stop

@section('content')
 
	<div class="page-inside page-about">
		<section>
			<div class="wrap row">
				<div class="section-title">
					<h3 class="wow fadeIn">@lang('site.about')</h3>
				</div>				
				<div class="section-content">				
					@if($about)
						<img src="{{asset('image/about/'.$about->image)}}" alt="" width="300" height="300">
						<p>{!!$about->content!!}</p>
					@endif					
					
				</div>
			</div>
		</section>
	</div>
@stop