@extends('layouts.dashboard')

@section('title')
	Profile
@stop

@section('content')
	
	<div class="user">
		@if(count($profile)>0)
			@if($profile->logo)
				<img src="{{asset('image/profile/'.$profile->logo)}}" alt="">
			@else
				<img src="{{asset('image/no-image.png')}}" alt="">				
			@endif
			{{$profile->user->email}}							
		@else
			<img src="{{asset('image/no-image.png')}}" alt="">
			{{Auth::user()->email}}
			<p>profile</p>
		@endif	

		<ul>
			<li><a href="#">Profile</a></li>
				@if(count($profile)>0)
					<li><a href="{{url('/profile/user/'.$profile->id.'/edit')}}">Edit Profile</a></li>
				@else
					<li><a href="{{url('/profile/user/create')}}">Create Profile</a></li>
				@endif			
		</ul>		
	</div>

	<div class="info">
		@if(!(count($profile)>0))
			<div class="left">
				<h3><a href="{{url('/profile/user/create')}}">Create Profile</a></h3>

			</div>
		@else
			<div class="detail">
				First Name:{{$profile->first_name}}
				Last Name:{{$profile->last_name}}
				Country:{{$profile->country}}
				Phone:{{$profile->phone}}
			</div>
		@endif
	</div>

@stop