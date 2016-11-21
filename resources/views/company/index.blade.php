@extends('layouts.app')
@section('title')
    Company
@stop
@section('content')
	
	<div class="search">
		
	</div>

	<div class="section">
		<h3>Explore Our Latest Company</h3>
		<div class="section-content" id="ajax-form">
            <ul class="archive-list">

                @foreach ($company as $com)	                
                    <li>
                        <div class="wrap">
                            <div class="img-wrap">
                               <img src="{{asset('storage/app/image/abfef141390370c56dbb036a95a5f281.jpeg')}}" alt="" width="300" height="300">
                            </div>
                            <div class="long-desc">
                                <div class="row">
                                    <h4 class="float-left">{{ $com->name }}</h4>
                                    <div class="star float-right"></div>
                                </div>
                                <div class="row">
                                    <p class="address">
                                        @if($com->contacts)
                                            {{ $com->contacts->address }}
                                        @endif
                                    </p>
                                </div>                              
                                <div class="row">
                                    <p class="mb">{{ $com->description }}</p>                                            
                                </div>
                                <hr class="darker">
                                <a href="{{ url('company/'.$com->id)}}" class="button">More Info</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            {{ $company->links()}}
        </div>
	</div>

@stop