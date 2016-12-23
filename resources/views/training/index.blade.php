@extends('layouts.app')

@section('title')
    @lang('site.about')
@stop
@section('content')


<div class="page-inside">

  @if(Request::url() == url('/training'))
    <nav>
        <div class="nav-wrapper row">
            <div class="col s12">
              <a href="/" class="breadcrumb">@lang('site.home')</a>
              <a href="#!" class="breadcrumb">@lang('site.training')</a>
          
           </div>
        </div>
      </nav>
    @else

    @if(isset($company) && $company !== 'search')

      <nav>
        <div class="nav-wrapper row">
            <div class="col s12">
              <a href="/" class="breadcrumb">@lang('site.home')</a>
              <a href="/company/{{$company->slug}}" class="breadcrumb">@lang('site.agencies')</a>
              <a href="/company/{{$company->slug}}/training" class="breadcrumb">@lang('site.agencies')</a>
              
            </div>
          </div>
       </nav>
    @endif
      

  @endif

  <div class="banner">
      <div class="wrap">
	
      	<div class="search">
              {!! Form::open([
                      'action' => '\App\Http\Controllers\SearchController@trainingSearch','method'=>'get']) !!}
              @include('frontend._search')
              <button type="submit"  class="search-btn"><i class="fa fa-search"></i></button>
              {!! Form::close() !!}		
      	</div>
      </div>
    </div>

		<section class="row training">
    <div class="wrap">
      @if(Request::url() == url('/training'))
        <div class="section-title">
          
        <h3>All Training</h3>  
        </div>
      @else
        @if(isset($company) && $company != 'search')
        <div class="section-title">
          
        <h3>Training of {{ $company->name}}</h3>
        </div>
      @else
        <div class="section-title">
          
        <h3>Search Results</h3>
          @if(count($training) < 1)
            <p>Sorry no result found</p>
          @endif
        </div>
      @endif

      @endif
      
      <div class="section-content">
        <ul class="lists row">
          <?php $d=0;?>
          @foreach($training as $tr)            
            @if($tr->company)           
            <li class="s12 m6 l4 col wow fadeInUp" data-wow-delay='{{$d}}s'>
              <div class="wrap">
                <div class="img-wrap">
                  <img src="{{asset('image/training/'.$tr->image)}}" alt="">
                </div>
                <div class="text-wrap">
                  <h5><a href="{{ url('company/'.$tr->company->slug.'/training/'.$tr->slug)}}">{{$tr->title}}</a></h5>
                  <p><i class="fa fa-globe"></i>{{$tr->country}}</p>
                  <p><i class="fa fa-time"></i>Duration</p>
                  <p>{{$tr->description}}</p>
                  <a class="btn waves-effect" href="#{{$tr->id}}">Apply Now</a><br>
                  <a href="{{ url('company/'.$tr->company->slug.'/training/'.$tr->slug)}}" class="right">More info</a>
                </div>
              </div>
            </li>
            
            <div id="{{$tr->id}}" class="modal">
                      <div class="modal-content">
                        <h3>Apply for {{$tr->title}}</h3>
                        {!! Form::open([
                          'action' => ['\App\Http\Controllers\ApplicationController@store',$tr->id],
                           'method'=>'post','files' => true]) !!}
                            <input type="text" name="full_name" placeholder="Full Name">
                            <input type="text"  name="email" placeholder="email">
                            <input type="text" name="contact" placeholder="Contact number">
                            <input type="hidden" value = "training" name="apply" hidden>
                          <div class="file-field input-field">                              
                            </div>
                            <button type="submit" class="btn" >Apply</button>
                          {!! Form::close() !!}
                      </div>
                  </div>

            @endif
            <?php $d =$d+0.3;?>
          @endforeach
        </ul>
      </div>
    </div>
  </section>
        </div>
	</div>

@stop