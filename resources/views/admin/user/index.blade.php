@extends('layouts.dashboard')

@section('title')
	User
@stop

@section('content')
	
	<div class="alluser">
		@include('admin._flash')
		<ul>
			@foreach($users as $user)
					
				<li>
					{{$user->name}}
					{!! Form::model($user, ['action'=>['\App\Http\Controllers\admin\UserController@suspend',$user->id],'method'=>'PUT']) !!}

                 		<button type="submit" class="waves-effect waves-light btn">Suspend</button>
					{!! Form::close() !!}
					{!! Form::model($user, ['action'=>['\App\Http\Controllers\admin\UserController@destroy',$user->id],'method'=>'DELETE']) !!}
                 		<button type="submit" class="waves-effect waves-light btn">Delete</button>
					{!! Form::close() !!}

				</li>
				<li>{{$user->name}}</li>


			@endforeach
		</ul>
	</div>

@stop