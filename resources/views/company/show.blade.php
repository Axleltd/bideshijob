@extends('layouts.app')

@section('content')
    <div class="page-inside page-single">
        <div class="banner">
            <div class="wrap">
                <h3>{{ $company->name }}</h3>

                <ul class="social">
                  <li><a href="https://facebook/itachi9841"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="https://twitter/itachi9841"><i class="fa fa-twitter"></i></a></li>
                </ul>
          </div>

        </div>
        <section class="row  page-company">
             
            <div class="wrap row">
                <div class="col s12 m6">
                    <div class="img-wrap">
                        
                      <img src="{{asset('image/'.$company->logo)}}" alt="" width="300" height="300">
                    </div>
                </div>
                <div class="col s12 m6 desc">
                    {{-- <div class="section-title row">                    
                        <h3>{{ $company->name }}</h3>      
                    </div> --}}
                    <div class="row">
                      <div class="col s12">
                        <p><i class="fa fa-map"></i> Address: company address</p>
                      </div>
                      <div class="col s12">
                        <p><i class="fa fa-envelope"></i> Email: company address</p>
                      </div>
                      <div class="col s12">
                        <p><i class="fa fa-phone"></i> Contact number: 984652165</p>
                      </div>
                    </div>
                                    
                    <p>{{ $company->description }}</p>                                    
                    {{-- <ul class="social">
                        @if($company->contacts && $company->contacts->socialMedia)
                        <li>
                            <a href="https:\\facebook.com\{{ $company->contacts->socialMedia->facebook}}">
                                Facebook
                            </a>
                          
                        </li>
                        @endif                    
                    </ul>    --}}         
                </div>
            </div>   
            
            @if($company->job !== null && $company->job->count() > 0 && $company->job->contains('featured',1))

              <section class="jobs row">
                <div class="section-content">      
                  <div class="section-title">
                    <h3 class="wow fadeIn">Featured Jobs</h3>
                  </div>
                  <ul class="lists row">
                      
                      @foreach($company->job as $job)
                      @if($job->featured)
                          <li class="wow fadeInUp">
                            <div class="wrap row">                            
                              <div class="img-wrap">
                                <img src="{{asset('image/'.$job->company->logo)}}" alt="">
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
                                <a href="{{ url('company/'.$job->company->slug.'/job/'.$job->slug)}}">More info</a>
                              </div>
                            </div>
                          </li>
                       @endif

                      @endforeach
                  </ul>
                </div>
              </section>
            @endif

            @if($company->training !== null && $company->training->count() > 0 && $company->training->contains('featured',1))

              <section class="row training">

                <div class="section-content">
                    <div class="section-title">
                      <h3 class="wow fadeIn">Featured Trainings</h3>
                    </div>
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
              </section>
            @endif
        </div>                    
        </section>
    </div>

@stop