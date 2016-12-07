@extends('layouts.app')

@section('title')
Homepage
@stop

@section('content')


<div class="page-wrap">
  <section class="banner">
    <div class="bg-div">
      <div class="particle-div"></div>
    </div>
    <div class="content-div">
      <div class="search-box wow fadeIn">
        {!! Form::open([
                'action' => '\App\Http\Controllers\SearchController@allSearch','method'=>'get']) !!}
          <input type="text" class="title" name="title" placeholder="Job / Training">
          <input type="text" class="location" name="address" placeholder="country">
          <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
          @push('script')
            <script>
              jQuery(document).ready(function($) {
                $('.location').autocomplete({
                    data:{
                      @include('company._countryList')
                  }
                });
                
              });
            </script>
          @endpush
        </form>
      </div>

      <div class="subscribe-box">
        <h3 class="">Subscribe with us</h3>        
        {!! Form::open(['action' => 'SubscriberController@store','files' => 'true','method'=>'post']) !!}
          <input type="text" name="name" placeholder="Full Name">
          <input type="email" name="email" placeholder="Email">
          <input type="text" name="contact" placeholder="Contact number">
          <div class="file-field input-field">
            <div class="btn">
              <span>Upload CV</span>
              <input type="file" name="cv">
            </div>
          </div>
          <button type='submit' class="btn" >Subscribe</button>
        {!! Form::close() !!}
      </div>
    </div>
  </section>

<div id="apply" class="modal">
    <div class="modal-content">
      <h3>Apply for JOB?TRAINING</h3>
      <form action="">
          <input type="text" placeholder="Full Name">
          <input type="text" placeholder="email">
          <input type="text" placeholder="Contact number">
          <div class="file-field input-field">
            <div class="btn">
              <span>Upload CV</span>
              <input type="file">
            </div>
          </div>
          <button class="btn" >Subscribe</button>
        </form>
    </div>
  </div>
  <section class="jobs row">
    @include('admin._flash')
    <div class="wrap">
      <div class="section-title">
        <h3 class="wow fadeIn">Featured Jobs</h3>
      </div>
    </div>
    <div class="section-content">
      <ul class="lists">
        @foreach($job as $jo)
          @if($jo->company)
            <li class="wow fadeInUp">
              <div class="wrap row">
                <div class="img-wrap">
                  <img src="{{asset('image/job/'.$jo->image)}}" alt="">
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
                  <a class="btn waves-effect" href="#{{$jo->id}}">Apply Now</a><br>
                  <a href="{{ url('company/'.$jo->company->slug.'/job/'.$jo->slug)}}">More info</a>
                </div>
              </div>
            </li>

            <div id="{{$jo->id}}" class="modal">
                <div class="modal-content">
                  <h3>Apply for {{$jo->title}}</h3>
                  {!! Form::open([
                    'action' => ['\App\Http\Controllers\ApplicationController@store', $jo->id],
                     'method'=>'post','files' => true]) !!}
                      <input type="text" name="full_name" placeholder="Full Name">
                      <input type="text"  name="email" placeholder="email">
                      <input type="text" name="contact" placeholder="Contact number">
                      <input type="hidden" name="apply" value="job">
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
    </div>
  </section>
  
  <section class="row training">
    <div class="wrap">
      <div class="section-title">
        <h3 class="wow fadeIn">Recent Trainings</h3>
      </div>
      
      <div class="section-content">
        <ul class="lists row">
          <?php $d=0;?>
          @foreach($training as $tr)            
            @if($tr->company)           
            <li class="s12 m6 l4 col wow fadeInUp" data-wow-delay='{{$d}}s'>
              <div class="wrap">
                <div class="img-wrap">
                  <img src="{{asset('image/training/'.$tr->image)}}" alt="">
                </div>
                <div class="text-wrap">
                  <h5>{{$tr->title}}</h5>
                  @if($tr->company->contacts)
                    <p><i class="fa fa-globe"></i>{{$tr->company->contacts->address}}</p>
                  @endif
                  <p><i class="fa fa-time"></i>Duration</p>
                  <p>{{$tr->description}}</p>                  
                  <a href="{{ url('company/'.$tr->company->slug.'/training/'.$tr->slug)}}" class="right">More info</a>
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

  <section class="services">
    <div class="wrap row">
      <div class="section-title">
        <h3 class="wow fadIn">Our Services</h3>
      </div>
      <div class="row section-content">
        <div class="s12 m4 col wow fadeInUp">
          <i class="fa fa-umbrella"></i>
          <h4>Insurance</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem modi molestias dolorem harum inventore. Vel!</p>
        </div>
        <div class="s12 m4 col wow fadeInUp">
          <i class="fa fa-user-md"></i>
          <h4>Medical</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem modi molestias dolorem harum inventore. Vel!</p>
        </div>
        <div class="s12 m4 col wow fadeInUp">
          <i class="fa fa-flag"></i>
          <h4>immigration</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem modi molestias dolorem harum inventore. Vel!</p>
        </div>
      </div>
    </div>
  </section>

  <section class="all-lists">
    <div class="wrap row">
      <div class="row">
        <div class="section-title row">
          <h4 class="left">Jobs</h4>
          <a class="right" href="/jobs">view all</a>
        </div>
        <ul>
          @foreach($job as $jo)
            @if($jo->company)
              <li><a href="{{ url('company/'.$jo->company->slug.'/job/'.$jo->slug)}}">{{$jo->title}}</a></li>          
            @endif
          @endforeach
        </ul>
      </div>
      <hr>
      <div class="row">
        <div class="section-title row">
          <h4 class="left">Trainings</h4>
          <a class="right" href="/training">view all</a>
        </div>
        <ul>
          @foreach($training as $tr)
            @if($tr->company)
            <li><a href="{{ url('company/'.$tr->company->slug.'/training/'.$tr->slug)}}">{{$tr->title}}</a></li>            
            @endif
          @endforeach
        </ul>
      </div>
      <hr>
      <div class="row">
        <div class="section-title row">
          <h4 class="left">Agencies</h4>
          <a class="right" href="/company">view all</a>
        </div>
        <ul>
          @foreach($company as $com)
          <li><a href="{{ url('company/'.$com->slug)}}">{{$com->name}}</a></li>          
          @endforeach
        </ul>
      </div>
    </div>
  </section>

  <section class="footer">
    
  </section>
</div>

@stop