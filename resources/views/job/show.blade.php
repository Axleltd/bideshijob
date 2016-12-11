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
                                {{-- <div class="company-wrap row">
                                    <div class="img-wrap">
                                        <img src="{{asset('image/'.$job->company->logo)}}" alt="">
                                    </div>
                                    <div class="text-wrap">                                    
                                        <h5><a href="#">{{$job->company->name}}</a></h5>
                                        <p>Address: {{$job->company->contacts->address}}</p>
                                        <a href="{{url('/company/'.$job->company->slug)}}" class="right">View more</a>
                                    </div>  --}} 
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row description">
                        <p>Description: {{$job->description}}</p>


                    </div>
                    <div class="row btn-row">
                         <a class="btn waves-effect" href="#{{$job->id}}">Apply Now</a><br>
                    </div>

                    <hr>
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


                                  
                </div>

            </div>

		</section>
        <section class="jobs row">
            
        </section>
	</div>
@stop