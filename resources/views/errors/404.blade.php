@extends('layouts.login')

@section('content')
	<div class="page-404">
		<div class="center-div">
			<h1>404 Error</h1>
			<p>Couldnt find what you are looking for!</p>
			<a href="{{ URL::previous() }}">Go Back</a>
			<div class="row">
				<div class="col s4"><a href="/jobs">View Jobs</a></div>
				<div class="col s4"><a href="/training">View Trainings</a></div>
				<div class="col s4"><a href="/faq">View FAQ</a></div>
			</div>
		</div>
	</div>

@stop