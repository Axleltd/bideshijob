@extends('layouts.app')
    
@section('content')
	 <div class="page-inside page-single">
         <section>
             
            <div class="wrap row">
                <div class="section-title row">                    
                    <h3 class="left">{{ $training->title }}</h3>
                    <p class="social right">
                      <a href="#"><i class="ti-facebook"></i></a> <a href="#"><i class="ti-twitter"></i></a> <a href="#"><i class="ti-googleplus"></i></a>
                    </p>
                </div>            
                <div class="section-content">
                    <div class="row">
                        <div class="s12 m8 col">
                            <p>Salary: 3215132</p>                
                            <p>Country: Nepal</p>                
                            <p>Quantity: 32M 24F</p>                
                            <p>Facalities: Some new, NEw facilities</p>
                            <p>Cost: 3215132</p>
                            <p>Duty Hours: 8hrs</p>
                            <p>Requirements: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae eos officia voluptatum omnis sunt repellat.</p>

                        </div>
                        <div class="s12 m4 col">
                            <div class="company-wrap row">
                                <div class="img-wrap">
                                    <img src="" alt="">
                                </div>
                                <div class="text-wrap">
                                    <h5><a href="#">Company Name</a></h5>
                                    <p>Address: city new</p>
                                    <a href="#" class="right">View more</a>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <p>Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore asperiores, vitae autem magnam delectus molestias distinctio, cumque laborum temporibus cupiditate sapiente quae aliquam obcaecati ab eos, modi. Ab nam quidem neque, placeat doloremque asperiores laudantium?</p>


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