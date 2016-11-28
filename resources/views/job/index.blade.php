@extends('layouts.app')

@section('title')
	All Jobs
@stop

@section('content')

<div class="page-inside">

	@if(Request::url() == url('/jobs'))
		<nav>
	  		<div class="nav-wrapper row">
	      		<div class="col s12">
	        		<a href="/" class="breadcrumb">Home</a>
	        		<a href="#!" class="breadcrumb">Jobs</a>
	        
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
			        <a href="/company/{{$company->id}}/job" class="breadcrumb">Job</a>
			        
			      </div>
			    </div>
			 </nav>
		@endif
			

	@endif
	<div class="banner">
    	<div class="wrap">
        
			<div class="search">
				 {!! Form::open([
                	'action' => '\App\Http\Controllers\SearchController@jobSearch','method'=>'get']) !!}
			        @include('frontend._search')
			        <button type="submit"  class="search-btn"><i class="fa fa-search"></i></button>
			    {!! Form::close() !!}	
			</div>

		</div>

	</div>
	<section class="page-content jobs">

		<div class="wrap row">
			@if(Request::url() == url('/jobs'))
				<div class="section-title">
					
				<h3>All Jobs</h3>  
				</div>
			@else
				@if(isset($company) && $company != 'search')
				<div class="section-title">
					
				<h3>Jobs of {{ $company->name}}</h3>
				</div>
			@else
				<div class="section-title">
					
				<h3>Search Results</h3>
				</div>
			@endif

			@endif


		    <div class="section-content">
		        <ul class="lists row">

					@foreach($jobs as $job)
					@if($job->company)
						<li class="wow fadeInUp">
			              <div class="wrap row">
			                <div class="img-wrap">
			                @if($job->company !== null)
			                  <img src="{{asset('image/'.$job->company->logo)}}" alt="">
			                @endif
			                </div>
			                <div class="text-wrap">
			                  <h5>{{$job->title}}</h5>
			                  <div class="row">
			                    <div class="s6 m4 col"><i class="fa fa-globe"></i>{{$job->country}}</div>
			                    <div class="s6 m4 col"><i class="fa fa-globe"></i>Salary:{{$job->salary}}</div>
			                    <div class="s6 m4 col"><i class="fa fa-globe"></i>Required Number:{{$job->quantity}}</div>
			                    <div class="s6 m4 col"><i class="fa fa-globe"></i>{{$job->facilities}}</div>
			                    <div class="s6 m4 col"><i class="fa fa-globe"></i>Cost:{{$job->cost}}</div>
			                    <div class="s6 m4 col"><i class="fa fa-globe"></i>Duty Hour:{{$job->duty_hours}}</div>
			                  </div>
			                  <div class="row">
			                    <p class="social">
			                      Share on <a href="#"><i class="ti-facebook"></i></a> <a href="#"><i class="ti-twitter"></i></a> <a href="#"><i class="ti-googleplus"></i></a>
			                    </p>
			                  </div>
			                </div>
			                <div class="btn-wrap">
			                  <button class="btn weaves-effect">Apply Now</button><br>
			                  <a href="{{ url('company/'.$job->company_id.'/job/'.$job->id)}}">More info</a>
			                </div>
			              </div>
			            </li>
			         @endif

					@endforeach
				</ul>
			</div>
		</div>
	</section>
	</div>
</div>
@stop

		