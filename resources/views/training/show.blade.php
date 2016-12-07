@extends('layouts.app')
    
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
                            <img src="{{asset('image/training/'.$training->image)}}" alt="">                           
                            

                        </div>
                        <div class="s12 m6 col">

                            <p>Country: {{$training->country}}</p>                
                            <p>Quantity: {{$training->quantity}}</p>                                                                        
                            <p>Training Time: {{$training->from}}-{{$training->to}}</p>
                            <p>Fees: {{$training->fees}}</p>    
                            <p>Categories: {{$training->categories}}</p>                            
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