@extends('layouts.dashboard')
@section('content')


	<div class="section-title">
		<div class="row">
			<h3 class="left">About Us</h3>
		</div>
		<ul class="bread-crumb">
			<li><a href="/profile">Dashboard</a></li>/
			<li><a href="#">About Us</a></li>/
		</ul>
	</div>

	<div class="section-content">

		<div class="row">
		@include('admin._flash')
		<ul>
			<li><a href="" class="btn">Edit</a></li>
			<li><a href="">Delete</a></li>
			<li>{{$about->content}}</li>

		</ul>

	</div>

@stop