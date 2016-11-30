@extends('layouts.dashboard')

@section('title')
	Company
@stop

@section('content')
		
	<div class="section-title">
		<h3>All Company</h3>
		<ul class="bread-crumb">			
			<li><a href="/profile">Dashboard</a></li>/
			<li><a href="#">My Company</a></li>/			

		</ul>
	</div>

	<div class="section-content">

		<div class="row">
			@include('admin._flash')
			@if(!count($companies)>0)
					<h5>You have not created a company yet!</h5>
					<a class="btn" href="{{url('/company/create')}}">Create A Company</a>
			@else
				<ul>
					@foreach($companies as $company)
						
						<li class="col s12 m4">
							<div class="card">
								<div class="card-image">   
									<img src="{{asset('image/'.$company->logo)}}" alt="">
								</div>
									
								
									<span class="card-title"><a href="{{url('/company/'.$company->slug)}}">{{$company->name}}</a> <i class="material-icons activator right">more_vert</i></span>
									<div class="row">
										<p>
											Status: 
											@if($company->status)
												Active
											@else
												Inactive
											@endif
										</p>
									</div>

							    <div class="card-reveal">
							      	<span class="card-title grey-text text-darken-4">More Options<i class="material-icons right">close</i></span>
							      	<a href="{{url('/company/'.$company->slug.'/job/create')}}" class="btn">Create job</a>
									<a href="{{url('/company/'.$company->slug.'/training/create')}}" class="btn">Create training</a>
							    </div>
							</div>
						</li>
				
					@endforeach
				</ul>
			@endif
		</div>		
	</div>

@stop