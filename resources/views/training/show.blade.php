@extends('layouts.app')
    
@section('content')
	 <div class="page-inside page-single">
         <section>
             
            <div class="wrap row">
                <div class="section-title row">                    
                    <h3 class="col s6">{{ $training->title }}</h3>
                    <p class="social col s6" style="text-align: center;">
                      <a href="#"><i class="ti-facebook"></i></a> <a href="#"><i class="ti-twitter"></i></a> <a href="#"><i class="ti-googleplus"></i></a>
                    </p>
                </div>            
                <div class="section-content">
                    <div class="row">
                        <div class="s12 m8 col">                            
                            <p>Country: {{$training->country}}</p>                
                            <p>Quantity: {{$training->quantity}}</p>                                                                        
                            <p>Training Time: {{$training->from}}-{{$training->to}}</p>
                            <p>Fees: {{$training->fees}}</p>    
                            <p>Categories: {{$training->categories}}</p>                            

                        </div>
                        <div class="s12 m4 col">
                            <div class="company-wrap row">
                                <div class="img-wrap">
                                    <img src="" alt="">
                                </div>
                                <div class="text-wrap">
                                    <h5><a href="#">{{$training->company->name}}</a></h5>
                                    <p>Address: {{$training->company->contacts->address}}</p>
                                    <a href="{{ url('/company/'.$training->company_id)}}" class="right">View more</a>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <p>Description: {{$training->description}}</p>


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
                {{-- contact --}}
                       
         </section>
    </div>                

@stop