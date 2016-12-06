<div class="form">
	<div class="row">
		<div class="col s12 m6">
			{!! Form::label('name','Company Name:') !!}	
			{!! Form::text('name',old('name')) !!}	
			@if(count($errors->get('name')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('name') as $error)
		                    <li>{{ $error  }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif		
		</div>
		<div class="col s12 m6 logo">

		   	{!! Form::label('logo', 'Logo:', ['class' => 'control-label']) !!}

		    @if(!empty($company->logo))
		        <div class="col-xs-2 thumb">
		            <a class="logo" href="#">
		                <img class="img-responsive" src="{{asset('image/'.$company->logo)}}"
		                     alt="{{$company->name}}" id="output">
		            </a>
		        </div>
		    @else
		        <div class="controls">
		        	<img src="{{asset('image/no-image.png')}}" alt="" id="output" width="300" height="300">
		        </div>
		    @endif

		    <div class="file-field input-field">
		      <div class="btn">
		        <span>Logo</span>

		        {!! Form::file('logo', array('onchange'=>'loadFile(event)','id'=>'image')) !!}
		       </div>
		    </div>
		    @if(count($errors->get('logo')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('logo') as $error)
		                    <li>{{ $error  }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif		

		</div>

		<div class="col s12">
			{!! Form::label('description','Description:') !!}
			{!! Form::textarea('description',old('description')) !!}
			@if(count($errors->get('description')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('description') as $error)
		                    <li>{{ $error  }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif		
		</div>
	</div>
</div>

<script>	
  	var loadFile = function(event) {
    var reader = new FileReader();
    var fil=0;

    reader.onload = function(){
    	    		
    		var output = document.getElementById('output');
    		 output.src = reader.result;

    };
    reader.readAsDataURL(event.target.files[0]);
  	};
 </script>



