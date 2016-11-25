@extends('layouts.dashboard')

@section('title')
	Company
@stop

@section('content')

	<div class="company">
		<ul>
			@foreach($companies as $company)
				
				<li>
					<img src="{{asset('image/'.$company->logo)}}" alt="">
					{{$company->name}}
				</li>
		
			@endforeach
		</ul>
	</div>

@stop