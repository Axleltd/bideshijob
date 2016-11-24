@extends('layouts.app')
@section('title')
    Company
@stop
@section('content')

<div class="page-inside">
	
	<div class="banner">
    <div class="wrap">
        
        <div class="search">
            
            {!! Form::open([
                    'action' => '\App\Http\Controllers\SearchController@companySearch','method'=>'get']) !!}
            @include('company._search')
            <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
            {!! Form::close() !!}
        </div>
    </div>
    </div>
    
    <section class="page-content training">
        
        <div class="wrap row">
          <div class="section-title">
            <h3 class="wow fadeIn">All Agencies</h3>
          </div>
          
            <div class="section-content">
                <ul class="lists row">

                        @foreach ($company as $com)	                
                            <li class="col s12 m6 l4">
                                <div class="wrap">
                                    <div class="img-wrap">
                                       <img src="{{asset('image/'.$com->logo)}}" alt="" width="300" height="300">
                                    </div>
                                    <div class="text-wrap">
                                        <a class="float-left h5">{{ $com->name }}</a>
                                        
                                        <p class="address">
                                            @if($com->contacts)
                                                {{ $com->contacts->address }}
                                            @endif
                                        </p>
                                       {{--  <p class="mb">{{ $com->description }}</p>                                       --}}      
                                         <a href="{{ url('company/'.$com->id)}}" class="right">More Info</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                </ul>
                {{ $company->links()}}
            </div>
    	</div>
    </section>
</div>

@stop