@extends('layouts.app')
    
@section('content')
    <div class="page-inside page-single">
        <div class="banner">
            <div class="wrap">
                <h3>{{ $training->title }}</h3>

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
                                <img src="{{asset('image/training/'.$training->image)}}" alt="">   
                           </div>                        
                            

                        </div>
                        <div class="s12 m6 col">

                            <p>Country: {{$training->country}}</p>                
                            <p>Quantity: {{$training->quantity}}</p>                                                                        
                            <p>Training Time: {{$training->from}}-{{$training->to}}</p>
                            <p>Fees: {{$training->fees}}</p>    
                            <p>Categories: {{$training->categories}}</p>                            


                        </div>
                        <div class="s12 m4 col">
                            <div class="company-wrap row">
                                <div class="img-wrap">
                                    <img src="{{asset('image/'.$training->company->logo)}}" alt="">
                                </div>
                                <div class="text-wrap">
                                    <h5><a href="#">{{$training->company->name}}</a></h5>
                                    @if($training->company->contacts !== null)
                                        <p>Address: {{$training->company->contacts->address}}</p>
                                    @endif
                                    <a href="{{ url('/company/'.$training->company->slug)}}" class="right">View more</a>
                                </div>  
                            </div>


                        </div>
                    </div>
                    <div class="row description">
                        <p>Description: {{$training->description}}</p>


                    </div>
                    <div class="row btn-row">
                        <button class="btn waves-effect">Apply Now</button>
                    </div>


                    <hr>
                                  
                </div>

            </div>
                {{-- contact --}}
                       
         </section>
    </div>                

@stop