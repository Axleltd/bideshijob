@extends('layouts.dashboard')
@section('content')
<h1>Posts</h1>
	<div class="company">
		@include('admin._flash')
		@foreach($posts as $post)
			
			<a target="_blank" href="{{url('/blog/'.$post->slug)}}"><h3>{{$post->title}}</h3></a>
			<img src="{{asset('image/blog/'.$post->logo)}}" alt="">
			<a href="{{ url('dashboard/posts/active/'.$post->id)}}" class="{{ ($post->status == 1) ?'disabled': null }} btn">Active</a>
			<a href="{{ url('dashboard/posts/suspend/'.$post->id)}}" class="{{ ($post->status == 0) ?'disabled': null }} btn">Suspend</a>			
			{!! Form::model($post,[
		                'action' => ['\App\Http\Controllers\admin\PostsController@destroy',$post->id],'method'=>'delete']) !!}				
				<button type="submit" class="waves-effect waves-light btn">Delete</button>
		    {!! Form::close() !!}
			

		@endforeach
	</div>

@stop