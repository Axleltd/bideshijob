@extends('layouts.app')
    
@section('content')
	 <div class="body-wrap inside">
        <div class="content-wrap row">
            <h1>Company Name : {{$training->company->name}}</h1>
            <div class="img-wrap small-12 large-6 columns">
                <img src="{{asset('image/'.$training->company->logo)}}" alt="" width="800" height="800">
            </div>
            <div class="small-12 large-6 columns details">
                <div class="section-title row">                    
                    <h3>{{ $training->title }}</h3>                  
                    <div class="rateYo"></div>                                        
                    <div class="row">
                         <p class="float-left">
                        <span>Address: </span>                        
                        @if($training->company->contacts)
                            {{ $training->company->contacts->address}} 
                        @endif                        
                        </p>                        
                    </div>

                </div>
                {{-- contact --}}
                                                                                                    
            </div>
        </div>                
            
    </div>

@stop