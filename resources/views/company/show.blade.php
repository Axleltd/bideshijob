@extends('layouts.app')

@section('content')
    <div class="page-inside page-single">
        <section class="row">
             
            <div class="wrap row">
                <div class="left">
                    <div class="img-wrap">
                        
                    <img src="{{asset('image/'.$company->logo)}}" alt="" width="300" height="300">
                    </div>
                </div>
                <div class="right">
                    <div class="section-title row">                    
                        <h3>{{ $company->name }}</h3>      
                    </div>
                                    
                    <p>{{ $company->description }}</p>                                    
                    <p class="social">
                        @if($company->contacts && $company->contacts->socialMedia)
                            <a href="https:\\facebook.com\{{ $company->contacts->socialMedia->facebook}}">
                                Facebook
                            </a>
                        @endif                    
                    </p>
                    <p class="training">
                        <a href="{{ url('company/'.$company->id.'/training')}}" class="button">Explore Our Training</a>
                    </p>                  
                </div>
            </div>   
            

            <div class="section-content">               
                 <h5>Featured Jobs</h5>
                <ul class="lists row">
                    
                    @foreach($company->job as $job)
                    @if($job->featured)
                        <li class="wow fadeInUp">
                          <div class="wrap row">                            
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

            <div class="section-content">
                <h5>Featured Trainings</h5>
                <ul class="lists row">
                  <?php $d=0;?>          
                  @foreach($company->training as $tr)            
                    @if($tr->featured)           
                    <li class="s12 m6 l4 col wow fadeInUp" data-wow-delay='{{$d}}s'>
                      <div class="wrap">                
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

@stop