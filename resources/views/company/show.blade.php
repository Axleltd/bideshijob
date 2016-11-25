@extends('layouts.app')

@section('content')
    <div class="page-inside page-single">
        <section class="row">
             
            <div class="wrap row">
                <div class="left">
                    <div class="img-wrap">
                        
                    <img src="{{asset('image/'.$company->logo)}}" alt="" >
                    </div>
                </div>
                <div class="right">
                    <div class="section-title row">                    
                        <h3>{{ $company->name }}</h3>      
                    </div>
                                    
                    <p>{{ $company->description }}</p>                                    
                    <p class="social">
                        @if($company->contacts && $company->contacts->socialMedia)
                            <a href="https:\\facebook.com\{{ $company->contacts->socialMedia->facebook}}">
                                Facebook
                            </a>
                        @endif                    
                    </p>
                    <p class="training">
                        <a href="{{ url('company/'.$company->id.'/training')}}" class="button">Explore Our Training</a>
                    </p>                  
                </div>
            </div>                
        </section>
    </div>

@stop