<div class="form">
	<div class="row">		
		<div class="col s12 m6">

		   	{!! Form::label('image', 'Image:', ['class' => 'control-label']) !!}

		    @if(isset($about->image))
		        <div class="col-xs-2 thumb">
		            <a class="logo" href="#">
		                <img class="img-responsive" src="{{asset('image/about/'.$about->image)}}"
		                     alt="image" id="output">
		            </a>
		        </div>
		    @else
		        <div class="controls">
		        	<img src="{{asset('image/no-image.png')}}" alt="" id="output" width="300" height="300">
		        </div>
		    @endif

		    <div class="file-field input-field">
		      <div class="btn">
		        <span>Image</span>

		        {!! Form::file('image', array('onchange'=>'loadFile(event)','id'=>'image')) !!}
		       </div>
		    </div>
		    @if(count($errors->get('image')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('image') as $error)
		                    <li>{{ $error  }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif		

		</div>

		<div class="col s12">
			{!! Form::label('content','Content:') !!}
			{!! Form::textarea('content',old('content')) !!}
			@if(count($errors->get('content')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('content') as $error)
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



