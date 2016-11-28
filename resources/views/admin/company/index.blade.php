@extends('layouts.dashboard')
@section('content')


	<div class="section-title">
		<div class="row">
			<h3 class="left">Profile</h3>
		</div>
		<ul class="bread-crumb">
			<li><a href="">Dashboard</a></li>/
			<li><a href="">Profile</a></li>/
		</ul>
	</div>

	<div class="section-content">

		<div class="row">
		@include('admin._flash')
		<ul>
			@foreach($company as $com)
				<li class="col m6 s12">
					<div class="card">
						<div class="card-image">
							<img src="{{asset('image/'.$com->logo)}}" alt="">
						</div>
						<span class="card-title">
							<a target="_blank" href="{{url('/company/'.$com->id)}}">{{$com->name}}</a>
						</span>
						<div class="row">
							<ul>
								<li class="col s12 m4">
									<a href="{{ url('dashboard/company/active/'.$com->id)}}" class="{{ ($com->status == 1) ?'disabled': null }} btn">Active</a>
								</li>
								<li class="col s12 m4">
									<a href="{{ url('dashboard/company/suspend/'.$com->id)}}" class="{{ ($com->status == 0) ?'disabled': null }} btn">Suspend</a>	
								</li>		
								<li class="col s12 m4">
									{!! Form::model($com,[
								                'action' => ['\App\Http\Controllers\admin\CompanyController@destroy',$com->id],'method'=>'delete']) !!}				
										<button type="submit" class="waves-effect waves-light btn">Delete</button>
								    {!! Form::close() !!}
								</li>
							</ul>
						</div>
					</div>
				</li>
			@endforeach

		</ul>
	</div>

@stop