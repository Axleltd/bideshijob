@extends('layouts.app')

@section('title')
    All Blog 
@stop
@section('content')


<div class="page-inside page-blog">


  <nav>
      <div class="nav-wrapper row">
          <div class="col s12">
            <a href="/" class="breadcrumb">@lang('site.home')</a>
            <a href="#!" class="breadcrumb">@lang('site.blog')</a>
        
         </div>
      </div>
  </nav>

  <div class="banner">
      <div class="wrap">
	
      	<div class="search">
              {!! Form::open([
                      'action' => '\App\Http\Controllers\SearchController@postSearch','method'=>'get']) !!}
              <input type="text" name="title" placeholder="Post Name">
              <button type="submit"  class="search-btn"><i class="fa fa-search"></i></button>
              {!! Form::close() !!}		
      	</div>
      </div>
    </div>

		<section class="row training">
    <div class="wrap">
        <div class="section-title">
          
        <h3>All Posts</h3>
        </div>
      
      <div class="section-content">
        <ul class="lists row">
          <?php $d=0;?>
          @foreach($posts as $post)            
                 
            <li class="s12 m6 l4 col wow fadeInUp" data-wow-delay='{{$d}}s'>
              @include('post._indexPost')
            </li>
   
            <?php $d =$d+0.3;?>
          @endforeach
        </ul>
        {!! $posts->links() !!}
      </div>
    </div>
  </section>
        </div>
	</div>

@stop