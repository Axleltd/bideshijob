@extends('layouts.app')

@section('title')
    Training
@stop
@section('content')


<div class="page-inside">

  @if(Request::url() == url('/training'))
    <nav>
        <div class="nav-wrapper row">
            <div class="col s12">
              <a href="/" class="breadcrumb">Home</a>
              <a href="#!" class="breadcrumb">Training</a>
          
           </div>
        </div>
      </nav>
    @else

    @if(isset($company) && $company !== 'search')

      <nav>
        <div class="nav-wrapper row">
            <div class="col s12">
              <a href="/" class="breadcrumb">Home</a>
              <a href="/company/{{$company->id}}" class="breadcrumb">Company</a>
              <a href="/company/{{$company->id}}/training" class="breadcrumb">Training</a>
              
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
                  <img src="{{asset('image/'.$tr->company->logo)}}" alt="">
                </div>
                <div class="text-wrap">
                  <h5>{{$tr->title}}</h5>
                  <p><i class="fa fa-globe"></i>{{$tr->country}}</p>
                  <p><i class="fa fa-time"></i>Duration</p>
                  <p>{{$tr->description}}</p>
                  <a href="{{ url('company/'.$tr->company_id.'/training/'.$tr->id)}}" class="right">More info</a>
                </div>
              </div>
            </li>
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