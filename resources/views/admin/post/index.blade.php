@extends('layouts.dashboard')
@section('content')

<div class="section-title">
	<div class="row">
		<h3 class="left">Posts</h3>
	</div>
	<ul class="bread-crumb">
		<li><a href="/profile">Dashboard</a></li>/
		<li><a href="#">All Post</a></li>/
	</ul>
</div>

<div class="company">
	@include('admin._flash')
	<a class="btn right" href="{{url('/blog/create')}}">Create A Post</a>													
	@foreach($posts as $post)
		
		<a target="_blank" href="{{url('/blog/'.$post->slug)}}"><h3>{{$post->title}}</h3></a>
		@if($post->image)
			<img src="{{asset('image/blog/'.$post->image)}}" alt="" width="300" height="300">
			@else
				<img src="{{asset('image/no-image.png')}}" alt="" width="300" height="300">
		@endif
		<a href="{{ url('dashboard/posts/active/'.$post->id)}}" class="{{ ($post->status == 1) ?'disabled': null }} btn">Active</a>
		<a href="{{ url('dashboard/posts/suspend/'.$post->id)}}" class="{{ ($post->status == 0) ?'disabled': null }} btn">Suspend</a>				
		<a href="{{ url('/blog/'.$post->slug.'/edit')}}" class="btn">Edit</a>			
		{!! Form::model($post,[
	                'action' => ['\App\Http\Controllers\admin\PostsController@destroy',$post->id],'method'=>'delete']) !!}				
			<button type="submit" class="waves-effect waves-light btn">Delete</button>
	    {!! Form::close() !!}
		

	@endforeach
</div>

@stop