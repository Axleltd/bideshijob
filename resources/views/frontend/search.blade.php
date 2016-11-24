@extends('layouts.app')

@section('title')
	Search
@stop

@section('content')
		
	<div class="search">
		<div class="search-box wow fadeIn">
	        {!! Form::open([
	                'action' => '\App\Http\Controllers\SearchController@allSearch','method'=>'get']) !!}
	          <input type="text" class="title" name="title" placeholder="Job / Training">
	          <input type="text" class="location" name="address" placeholder="country">
	          <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
	        </form>
      	</div>
		<div class="section-title">
	        <h3 class="wow fadeIn">Search Results</h3>
	    </div>
	<section class="jobs row">	    
		<div class="section-content">
	        <ul class="lists row">
	          <?php $d=0;?>
	          @foreach($training as $tr)            
	            @if($tr->company)   
	            <h3 class="wow fadeIn">Training</h3>        
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
      </section>		
		
		<section class="jobs row">	    
		    <div class="section-content">
		      <ul class="lists">
		        @foreach($job as $jo)
		          @if($jo->company)
		          <h3 class="wow fadeIn">Jobs</h3>        
		            <li class="wow fadeInUp">
		              <div class="wrap row">
		                <div class="img-wrap">
		                  <img src="{{asset('image/'.$jo->company->logo)}}" alt="">
		                </div>
		                <div class="text-wrap">
		                  <h5>{{$jo->title}}</h5>
		                  <div class="row">
		                    <div class="s6 m4 col"><i class="fa fa-globe"></i>{{$jo->company->contacts->country}}</div>
		                    <div class="s6 m4 col"><i class="fa fa-globe"></i>Salary:{{$jo->salary}}</div>
		                    <div class="s6 m4 col"><i class="fa fa-globe"></i>Required Number:{{$jo->quantity}}</div>
		                    <div class="s6 m4 col"><i class="fa fa-globe"></i>{{$jo->facilities}}</div>
		                    <div class="s6 m4 col"><i class="fa fa-globe"></i>Cost:{{$jo->cost}}</div>
		                    <div class="s6 m4 col"><i class="fa fa-globe"></i>Duty Hour:{{$jo->duty_hours}}</div>
		                  </div>
		                  <div class="row">
		                    <p class="social">
		                      Share on <a href="#"><i class="ti-facebook"></i></a> <a href="#"><i class="ti-twitter"></i></a> <a href="#"><i class="ti-googleplus"></i></a>
		                    </p>
		                  </div>
		                </div>
		                <div class="btn-wrap">
		                  <button class="btn weaves-effect">Apply Now</button><br>
		                  <a href="{{ url('company/'.$jo->company_id.'/job/'.$jo->id)}}">More info</a>
		                </div>
		              </div>
		            </li>
		            @endif
		          @endforeach
		      </ul>
		    </div>
  	</section>		
	</div>

@stop