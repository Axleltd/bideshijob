@extends('layouts.app')

@section('title')
	{{$job->title}}
@stop

@section('content')
	 <div class="page-inside page-single">
        <div class="banner">
            <div class="wrap">
                <h3>{{ $job->title }}</h3>

                <ul class="social">
                  <li><a href="https://facebook/itachi9841"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="https://twitter/itachi9841"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>

        </div>

         <section>
             
           <div class="wrap row">
                <div class="section-content">
                    <div class="row">
                        <div class="s12 m6 col">
                            <div class="img-wrap">
                                <img src="{{asset('image/job/'.$job->image)}}" alt="">
                            </div>
                            

                        </div>
                        <div class="s12 m6 col">
                            <p>Salary: {{$job->salary}}</p>                
                            <p>Country: {{$job->country}}</p>                
                            <p>Quantity: {{$job->quantity}}</p>                
                            <p>Facalities: {{$job->facilities}}</p>
                            <p>Cost: {{$job->cost}}</p>
                            <p>Duty Hours: {{$job->duty_hours}}</p>
                            <p>Requirements: {{$job->requirement}}</p>
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
                    
                    <div class="row description">
                        <p>Description: {{$job->description}}</p>


                    </div>
                    <div class="row btn-row">
                        <button class="btn waves-effect">Apply Now</button>
                    </div>

                    <hr>


                                  
                </div>

            </div>

		</section>
        <section class="jobs row">
            
        </section>
	</div>
@stop