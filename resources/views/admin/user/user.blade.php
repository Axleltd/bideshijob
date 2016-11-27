@extends('layouts.dashboard')

@section('title')
	Profile
@stop

@section('content')


	<div class="section-title">
		<div class="row">
			<h3 class="left">Profile</h3>
			<div class="right">
				@if(!(count($profile)>0))
				
					<a  class="btn" href="{{url('/profile/user/create')}}">Create Profile</a>
				
				@endif
			</div>
		</div>
		<ul class="bread-crumb">
			<li><a href="">Dashboard</a></li>/
			<li><a href="">Profile</a></li>/
		</ul>
	</div>

	<div class="section-content">

		<div class="row">
	
			<div class="user col s12 m6">
				@if(count($profile)>0)
					@if($profile->logo)
						<img src="{{asset('image/profile/'.$profile->logo)}}" alt="">
					@else
						<img src="{{asset('image/no-image.png')}}" alt="">				
					@endif
					<p>{{$profile->user->email}}</p>							
				@else
					<img src="{{asset('image/no-image.png')}}" alt="">
					<p>{{Auth::user()->email}}</p>
				@endif	

				<ul>
						@if(count($profile)>0)
							<li><a href="{{url('/profile/user/'.$profile->id.'/edit')}}">Edit Profile</a></li>
						@else
							<li><a href="{{url('/profile/user/create')}}">Create Profile</a></li>
						@endif			
				</ul>		
			</div>

			<div class="info col s12 m6">
				@if(!(count($profile)>0))
					<h5>No Profile Details. <a href="{{url('/profile/user/create')}}">Click here</a> to create a profile</h5>
				@else
					<div class="detail">
						<p>First Name: {{$profile->first_name}}</p>
						<p>Last Name: {{$profile->last_name}}</p>
						<p>Country: {{$profile->country}}
						</p>
						<p>Phone: <a href="tel:{{$profile->phone}}">{{$profile->phone}}</a>
						</p>
					</div>
				@endif
			</div>
		</div>
	</div>

@stop