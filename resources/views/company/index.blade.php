@extends('layouts.app')

@section('content')
	
	<div class="search">
		
	</div>

<<<<<<< HEAD
	<div class="company">
=======
	<div class="section">
>>>>>>> 3b6b3eb18f01f600b25c8477d22910061618cbb6
		<h3>Explore Our Latest Company</h3>
		<div class="section-content" id="ajax-form">
            <ul class="archive-list">

<<<<<<< HEAD
                @foreach ($company as $com)	
=======
                @foreach ($company as $com)	                
>>>>>>> 3b6b3eb18f01f600b25c8477d22910061618cbb6
                    <li>
                        <div class="wrap">
                            <div class="img-wrap">
                               <img src="{{asset('image/'.$com->logo)}}" alt="" width="300" height="300">
                            </div>
                            <div class="long-desc">
                                <div class="row">
                                    <h4 class="float-left">{{ $com->name }}</h4>
                                    <div class="star float-right"></div>
                                </div>
                                <div class="row">
<<<<<<< HEAD
                                    <p class="address">{{ $com->contact->address }}</p>
=======
                                    <p class="address">
                                        @if($com->contacts)
                                            {{ $com->contacts->address }}
                                        @endif
                                    </p>
>>>>>>> 3b6b3eb18f01f600b25c8477d22910061618cbb6
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