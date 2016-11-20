@extends('layouts.app')

@section('content')
	 {!! Form::open([
                'action' => '\App\Http\Controllers\Company\CompanyController@store',
                 'method'=>'post','files' => true]) !!}
		@include('company._form')
		@include('company._contact')
		
		<div class="file-field input-field">		 
		      <div class="btn">		      	      	
		      		<span>Logo</span>		      		
		        	{!! Form::file('logo',array('onchange'=>'loadFile(event)')) !!}       	        
		      </div>		  			  		
		  		<div class="controls">
		  			
		  		</div> 	      
	    </div>  
		<button type="submit" class="waves-effect waves-light btn">Continue</button>
	{!! Form::close() !!}
@stop

<script>	
  	var loadFile = function(event) {
    var reader = new FileReader();
    var fil=0;

    reader.onload = function(){
    	
    		var inp=$('.controls').append('<img id="output" width="300" height="300"/>');
    		var output = document.getElementById('output');
    		 output.src = reader.result;

    };
    reader.readAsDataURL(event.target.files[0]);
  	};
</script>



