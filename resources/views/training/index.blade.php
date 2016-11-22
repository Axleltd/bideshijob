@extends('layouts.app')

@section('title')
    Training
@stop
@section('content')
	
	<div class="search">
        {!! Form::open([
                'action' => '\App\Http\Controllers\SearchController@trainingSearch']) !!}
        @include('frontend._search')
        <button type="submit"  class="btn">Search</button>
        {!! Form::close() !!}		
	</div>

	<div class="section">
		<h3>Explore Our Latest Training</h3>
		<div class="section-content" id="ajax-form">
            <ul class="archive-list">

                @foreach ($training as $tr)	                
                    <li>
                        <div class="wrap">                            
                            <div class="long-desc">
                                <div class="row">
                                    <h4 class="float-left">{{ $tr->title }}</h4>
                                    <div class="star float-right"></div>
                                </div>
                                <div class="row">
                                   Categories: <p class="address">{{ $tr->categories }}</p>
                                </div>                              
                                <div class="row">
                                    Fees:<p class="mb">{{ $tr->fees }}</p>                                            
                                </div>
                                <div class="row">
                                    Quantity:<p class="mb">{{ $tr->quantity }}</p>                                            
                                </div>
                                <hr class="darker">
                                <a href="{{ url('company/'.$tr->company_id.'/training/'.$tr->id)}}" class="button">More Info</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            {{-- $training->links() --}}
        </div>
	</div>

@stop