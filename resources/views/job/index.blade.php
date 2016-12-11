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
		    	@include('admin._flash')
		        <ul class="lists row">

					@foreach($jobs as $job)
					@if($job->company)
						<li class="wow fadeInUp">
			              <div class="wrap row">
			                <div class="img-wrap">
			                @if($job->company !== null)
			                  <img src="{{asset('image/job/'.$job->image)}}" alt="">
			                @endif
			                </div>
			                <div class="text-wrap">
			                  <h5>{{$job->title}}</h5>
			                  <div class="row">
			                    <div class="s12 m6 l4 col"><i class="fa fa-globe"></i>{{$job->country}}</div>
			                    <div class="s12 m6 l4 col"><i class="fa fa-globe"></i>Salary:{{$job->salary}}</div>
			                    <div class="s12 m6 l4 col"><i class="fa fa-globe"></i>Required Number:{{$job->quantity}}</div>
			                    <div class="s12 m6 l4 col"><i class="fa fa-globe"></i>{{$job->facilities}}</div>
			                    <div class="s12 m6 l4 col"><i class="fa fa-globe"></i>Cost:{{$job->cost}}</div>
			                    <div class="s12 m6 l4 col"><i class="fa fa-globe"></i>Duty Hour:{{$job->duty_hours}}</div>
			                  </div>
			                  <div class="row">
			                    <p class="social">
			                      Share on <a href="#"><i class="ti-facebook"></i></a> <a href="#"><i class="ti-twitter"></i></a> <a href="#"><i class="ti-googleplus"></i></a>
			                    </p>
			                  </div>
			                </div>
			                <div class="btn-wrap">
			                  <a class="btn waves-effect" href="#{{$job->id}}">Apply Now</a>
			                  <a href="{{ url('company/'.$job->company->slug.'/job/'.$job->slug)}}">More info</a>
			                </div>
			              </div>
			            </li>
			            <div id="{{$job->id}}" class="modal">
			                <div class="modal-content">
			                  <h3>Apply for {{$job->title}}</h3>
			                  {!! Form::open([
			                    'action' => ['\App\Http\Controllers\ApplicationController@store',$job->id],
			                     'method'=>'post','files' => true]) !!}
			                      <input type="text" name="full_name" placeholder="Full Name">
			                      <input type="text"  name="email" placeholder="email">
			                      <input type="text" name="contact" placeholder="Contact number">
			                      <input type="text" value = "job" name="apply" hidden>
			                      <div class="file-field input-field">
			                        <div class="btn">
			                          <span>Upload CV</span>
			                          <input type="file" name="cv">
			                        </div>
			                      </div>
			                      <button type="submit" class="btn" >Apply</button>
			                    {!! Form::close() !!}
			                </div>
			            </div>
			         @endif

					@endforeach
				</ul>
				{!! $jobs->links() !!}
			</div>
		</div>
	</section>
	</div>
</div>
@stop

		