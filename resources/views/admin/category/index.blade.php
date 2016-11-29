@extends('layouts.dashboard')
@section('content')
	<h1>Categories</h1>
	<div class="company">
		@include('admin._flash')
		@foreach($categories as $category)
			
			<a target="_blank" href="{{url('/help-center/'.$category->slug)}}"><h3>{{$category->name}}</h3></a>
			<!-- <img src="{{asset('image/'.$category->logo)}}" alt=""> -->
			<a href="{{ url('dashboard/category/active/'.$category->slug)}}" class="{{ ($category->status == 1) ?'disabled': null }} btn">Active</a>
			<a href="{{ url('dashboard/category/suspend/'.$category->slug)}}" class="{{ ($category->status == 0) ?'disabled': null }} btn">Suspend</a>			
			{!! Form::model($category,[
		                'action' => ['\App\Http\Controllers\admin\CategoriesController@destroy',$category->id],'method'=>'delete']) !!}				
				<button type="submit" class="waves-effect waves-light btn">Delete</button>
		    {!! Form::close() !!}
			

		@endforeach
	</div>

@stop