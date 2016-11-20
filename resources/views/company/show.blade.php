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
                        <span>Address: </span>
                        {{ $company->contact->address}}
                        </p>                        
                    </div>

                </div>
                {{-- contact --}}
                                
                <p>{!! $company->description !!}</p>
                <p class="social">
                    <a href="https:\\facebook.com\{{ $company->contact->socialMedia->facebook}}">
                        <i class="fa fa-facebook"></i>
                    </a>
                </p>                  
            </div>
        </div>                
            
    </div>

@stop