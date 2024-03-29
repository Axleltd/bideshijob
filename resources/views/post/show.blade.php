@extends('layouts.app')

@section('title')
	{{$post->title}}
@stop

@section('content')
<div id="page-inside">
	
	
  <nav>
      <div class="nav-wrapper row">
          <div class="col s12">
            <a href="/" class="breadcrumb">@lang('site.home')</a>
            <a href="/blog/" class="breadcrumb">Blog</a>
            @if($post->category !== null && $post->category->count() > 0)
            	<a href="/help-center/{{$post->category->slug}}" class="breadcrumb">{{$post->category->name}}</a>
            @endif
            <a href="#!" class="breadcrumb">{{$post->title}}</a>
        
         </div>
      </div>
  </nav>

	<div class="row">	
		<div class="container">
			<h3>{{ $post->title }}</h3>
			@if($post->image)
				<img src="{{asset('image/blog/'.$post->image)}}" alt="" width="300" height="300">
				@else
				<img src="{{asset('image/no-image.png')}}" alt="" width="300" height="300">
			@endif
			@if($post->category !== null && $post->category->count() > 0)
			<h3>{{ $post->category->name }}</h3>
			@endif			
			<h4>{{ $post->published_on}}</h4>
			<p><small>{!! $post->short_description !!}</small></p>
			<p>
				{!! $post->content !!}
			</p>
		</div>
	</div>
</div>
@stop