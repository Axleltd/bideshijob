@extends('layouts.dashboard')
@section('content')
	<div class="section-title">
		<div class="row">
			<h3 class="left">Training</h3>			
		</div>
		<ul class="bread-crumb">
			<li><a href="/profile">Dashboard</a></li>/
			<li><a href="#">All Training</a></li>/
		</ul>
	</div>

	@include('admin._flash')
	<div class="section-content">

		<ul class="row">
		@include('admin._flash')
		@foreach($trainings as $training)
			<li class="col s12 m6">
				<div class="card">
					<div class="card-image">
						<img src="{{asset('image/training/'.$training->image)}}" alt="">
					</div>
					<span class="card-title">
						<a href="{{url('company/'.$training->company->slug.'/training/'.$training->slug)}}">{{$training->title}}</a>
					</span>

					<div class="row">
						<div class="col s12 m4">
							<a href="{{ url('dashboard/training/featured/'.$training->id)}}" class="{{ ($training->featured == 1) ?'disabled': null }} btn"  style="font-size: 12px;">Featured</a>
							
						</div>
						<div class="col s12 m4">
							<a href="{{ url('dashboard/training/unfeatured/'.$training->id)}}" class="{{ ($training->featured == 0) ?'disabled': null }} btn"  style="font-size: 12px;">UnFeatured</a>
							
						</div>
						<div class="col s12 m4">							
							{!! Form::model($training,[
						                'action' => ['\App\Http\Controllers\admin\TrainingController@destroy',$training->id],'method'=>'delete']) !!}				
								<button type="submit" class="waves-effect waves-light red acent-2 btn">Delete</button>
						    {!! Form::close() !!}							
							
						</div>
					</div>
				</div>
			</li>

					
					
					
					
					
					

				@endforeach
		</div>		
	</div>

@stop