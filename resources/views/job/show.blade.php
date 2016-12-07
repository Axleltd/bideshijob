@extends('layouts.app')

@section('title')
	{{$job->title}}
@stop

@section('content')
	 <div class="page-inside page-single">
         <section>
             
           <div class="wrap row">
                <div class="section-title row">                    
                    <h3 class="col s6">{{ $job->title }}</h3>
                    <p class="social col s6" style="text-align: center;">
                      <a href="#"><i class="ti-facebook"></i></a> <a href="#"><i class="ti-twitter"></i></a> <a href="#"><i class="ti-googleplus"></i></a>
                    </p>
                </div>            
                <div class="section-content">
                    <div class="row">
                        <div class="s12 m8 col">
                            <img src="{{asset('image/job/'.$job->image)}}" alt="">
                            <p>Salary: {{$job->salary}}</p>                
                            <p>Country: {{$job->country}}</p>                
                            <p>Quantity: {{$job->quantity}}</p>                
                            <p>Facalities: {{$job->facilities}}</p>
                            <p>Cost: {{$job->cost}}</p>
                            <p>Duty Hours: {{$job->duty_hours}}</p>
                            <p>Requirements: {{$job->requirement}}</p>

                        </div>
                        <div class="s12 m4 col">
                            @if($job->featured)
                                <div class="company-wrap row">
                                    <div class="img-wrap">
                                        <img src="{{asset('image/'.$job->company->logo)}}" alt="">
                                    </div>
                                    <div class="text-wrap">                                    
                                        <h5><a href="#">{{$job->company->name}}</a></h5>
                                        <p>Address: {{$job->company->contacts->address}}</p>
                                        <a href="{{url('/company/'.$job->company->slug)}}" class="right">View more</a>
                                    </div>  
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <p>Description: {{$job->description}}</p>


                    </div>
                    <div class="row">
                        <div class="col s12 m6">
                            
                        </div>
                        <div class="col s12 m6">
                            <button class="btn waves-effect">Apply Now</button>
                        </div>
                    </div>
                                  
                </div>

            </div>
		</section>
	</div>
@stop