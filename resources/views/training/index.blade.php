@extends('layouts.app')

@section('title')
    Training
@stop
@section('content')
	
	<div class="search">
        {!! Form::open([
                'action' => '\App\Http\Controllers\SearchController@trainingSearch','method'=>'get']) !!}
        @include('frontend._search')
        <button type="submit"  class="btn">Search</button>
        {!! Form::close() !!}		
	</div>

	<div class="section">
		<section class="row training">
    <div class="wrap">
      <div class="section-title">
        <h3 class="wow fadeIn">All Trainings</h3>
      </div>
      
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
                  <p><i class="fa fa-globe"></i>{{$tr->company->contacts->address}}</p>
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