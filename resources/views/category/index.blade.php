@extends('layouts.app')

@section('title')
    All Categories 
@stop
@section('content')


<div class="page-inside">


  <nav>
      <div class="nav-wrapper row">
          <div class="col s12">
            <a href="/" class="breadcrumb">@lang('site.home')</a>
            <a href="#!" class="breadcrumb">Help Center</a>
        
         </div>
      </div>
  </nav>

  <div class="banner">
      <div class="wrap">
	
      	<div class="search">
              {!! Form::open([
                      'action' => '\App\Http\Controllers\SearchController@postSearch','method'=>'get']) !!}
              @include('frontend._search')
              <button type="submit"  class="search-btn"><i class="fa fa-search"></i></button>
              {!! Form::close() !!}		
      	</div>
      </div>
    </div>

		<section class="row training">
    <div class="wrap">
        <div class="section-title">
          
        <h3>All Categories</h3>
        </div>
      
      <div class="section-content">
        <ul class="lists row">
          <?php $d=0;?>
          @foreach($categories as $category)            
                 
            <li class="s12 m6 l4 col wow fadeInUp" data-wow-delay='{{$d}}s'>
              @include('post._indexCategory')
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