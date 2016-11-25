@extends('layouts.dashboard')

@section('title')
	User
@stop

@section('content')
	
	<div class="alluser">
		<ul>
			@foreach($users as $user)
					
				<li>{{$user->name}}</li>

			@endforeach
		</ul>
	</div>

@stop