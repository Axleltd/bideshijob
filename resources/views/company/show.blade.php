@extends('layouts.app')

@section('content')
	
	 <div class="body-wrap inside">
        <div class="content-wrap row">
            <div class="img-wrap small-12 large-6 columns">
                <img src="{{asset('image/'.$company->logo)}}" alt="" width="800" height="800">
            </div>
            <div class="small-12 large-6 columns details">
                <div class="section-title row">                    
                    <h3>{{ $company->name }}</h3>                  
                    <div class="rateYo"></div>                    
                    
                    <div class="row">
                         <p class="float-left">
<<<<<<< HEAD
                        <span>Address: </span>
                        {{ $company->contact->address}}
=======
                        <span>Address: </span>                        
                        @if($company->contacts)
                            {{ $company->contacts->address}} 
                        @endif                        
>>>>>>> 3b6b3eb18f01f600b25c8477d22910061618cbb6
                        </p>                        
                    </div>

                </div>
                {{-- contact --}}
                                
<<<<<<< HEAD
                <p>{!! $company->description !!}</p>
                <p class="social">
                    <a href="https:\\facebook.com\{{ $company->contact->socialMedia->facebook}}">
                        <i class="fa fa-facebook"></i>
                    </a>
=======
                <p>{{ $company->description }}</p>                                    
                <p class="social">
                    @if($company->contacts->socialMedia)
                        <a href="https:\\facebook.com\{{ $company->contacts->socialMedia->facebook}}">
                            <i class="fa fa-facebook"></i>
                        </a>
                    @endif                    
>>>>>>> 3b6b3eb18f01f600b25c8477d22910061618cbb6
                </p>                  
            </div>
        </div>                
            
    </div>

@stop