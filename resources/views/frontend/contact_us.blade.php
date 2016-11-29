@extends('layouts.app')

@section('title')
Contact-Us
@stop

@section('content') 


<div class="page-inside page-contact">
	<div class="banner">
    	<div class="wrap">
        	<h3>Contact Us</h3>
		</div>

	</div>
	<section class="page-content contact_us">

		<div class="wrap row">
			<div class="col s12 m6 form">

				{!! Form::open([
		        'method'=>'post','files' => true]) !!}
					@include('frontend._msg')
					<button type="submit" class="waves-effect waves-light btn"> Send</button>
				{!! Form::close() !!}
			</div>
			<div class="col s12 m6 info">
				<h4>Bideshi Kaam</h4>
				<p><i class="fa fa-map"></i> Address: Sanepa, Lalitput Nepal</p>
				<p><i class="fa fa-phone"></i> Contact Number: <a href="#">8946513215</a>, <a href="#">8946513215</a></p>
				<p><i class="fa fa-envelope"></i> Email: <a href="#">info@bideshikaam.com</a></p>
			</div>
		</div>
		<section class="map">
			<div id="map" style="height: 50vh; width: 100vw;"></div>
		</section>
	</section>
@stop

@push('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvDQqg3zszpBHiw5B8gEMhfBFMt3h_ZPE&callback=initMap"
    async defer></script>

    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
    </script>
@endpush