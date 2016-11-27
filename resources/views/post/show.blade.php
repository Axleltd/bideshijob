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
            <a href="#!" class="breadcrumb">{{$post->title}}</a>
        
         </div>
      </div>
  </nav>

	<div class="row">	
		<div class="container">
			<h3>{{ $post->title }}</h3>
			<h4>{{ $post->published_on}}</h4>
			<p><small>{!! $post->short_description !!}</small></p>
			<p>
				{!! $post->content !!}
			</p>
		</div>
	</div>
</div>
@stop