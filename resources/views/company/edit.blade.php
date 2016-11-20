@extends('layouts.app')

@section('content')
	 {!! Form::model($company, ['action'=>['\App\Http\Controllers\Company\CompanyController@update',$company->id],'method'=>'PUT','files' => true]) !!}
		@include('company._form')
		@include('company._contact')
		 <div class="file-field input-field">
		 @if(!($company->logo))
		      <div class="btn">	      	
		      		<span>Logo</span>
		        	{!! Form::file('logo') !!}       	        
		      </div>
		  	@else
		  		<img src="{{asset('image/'.$company->logo)}}" alt="" width="300" height="300">
		  				  		      
	      @endif
	    </div>  
		<button type="submit" class="waves-effect waves-light btn">Continue</button>
	{!! Form::close() !!}
@stop

<script>	
  	var loadFile = function(event) {
    var reader = new FileReader();
    var fil=0;

    reader.onload = function(){
    	
    		var inp=$('.controls').append('<img id="output"/>');
    		var output = document.getElementById('output');
    		 output.src = reader.result;

    };
    reader.readAsDataURL(event.target.files[0]);
  	};
</script>

