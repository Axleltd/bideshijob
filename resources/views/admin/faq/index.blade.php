@extends('layouts.dashboard')

@section('title')
FAQ
@stop

@section('content') 
	<div class="section-title">
		<div class="row">
			<h3 class="left">FAQ</h3>
			<a href="/dashboard/faq/create" class="btn right">Create New</a>
		</div>
		<ul class="bread-crumb">
			<li><a href="/profile">Dashboard</a></li>/
			<li><a href="#">All FAQ</a></li>/
		</ul>
	</div>	
	@include('admin._flash')
	@foreach($faq as $faq)
			<div class="col s12 m12">	
				<h5>Question: {{$faq->question}}</h5>
				<p>Answer: {{ $faq->answer }}</p>
				<p>Status:
					@if($faq->status)
						Active
					@else
						Inactive
					@endif	
				</p>
				
				<div class="row">
					<div class="col s6 m3">									
						<p> <a href="/dashboard/faq/{{$faq->id}}/edit" class="btn">Edit</a></p>
					</div>
					<div class="col s6 m3">
						<p> <a href="/dashboard/faq/active/{{$faq->id}}" class="{{ ($faq->status == 1) ?'disabled': null }} btn">Active</a></p>		
					</div>
					<div class="col s6 m3">
						<p> <a href="/dashboard/faq/suspend/{{$faq->id}}" class="{{ ($faq->status == 0) ?'disabled': null }} btn">Suspend</a></p>
					</div>
					<div class="col s6 m3">
						<p>{!! Form::model($faq,[
			                'action' => ['\App\Http\Controllers\admin\FAQController@destroy',$faq->id],'method'=>'delete']) !!}				
							<button type="submit" class="waves-effect waves-light btn red acent-2">Delete</button>
					    {!! Form::close() !!}</p>
					</div>
				</div>
						
								
				
			</div>
			<hr>
		@endforeach
@stop