<div class="form">
	<div class="row">
		<div class="col s12 m6">
			{!! Form::label('title','Post Title:') !!}	
			{!! Form::text('title',old('title')) !!}	
			@if(count($errors->get('title')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('title') as $error)
		                    <li>{{ $error  }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif		
		</div>
		<div class="col s12 m6">
			{!! Form::label('slug','Slug:') !!}
			{!! Form::textarea('slug',old('slug')) !!}
			@if(count($errors->get('slug')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('slug') as $error)
		                    <li>{{ $error  }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif		
		</div>
		<div class="form-group">
		    {!! Form::label('image', 'Image:', ['class' => 'control-label']) !!}
		    @if(isset($psot->image))
		        <div class="col-xs-2 thumb">
		            <a class="image" href="#">
		                <img class="img-responsive" src="{{asset('image/'.$post->image)}}"
		                     alt="{{$post->title}}" id="output">
		            </a>
		        </div>
		    @else
		        <div class="controls">
		        	<img src="{{asset('image/no-image.png')}}" alt="" id="output" width="300" height="300">
		        </div>
		    @endif

		        {!! Form::file('image', array('onchange'=>'loadFile(event)','id'=>'image')) !!}
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
		<div class="col s12 m6">
			{!! Form::label('content','Content:') !!}	
			{!! Form::text('content',old('content')) !!}	
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
		<div class="col s12 m6">
			{!! Form::label('short_description','Description:') !!}	
			{!! Form::text('short_description',old('short_description')) !!}	
			@if(count($errors->get('short_description')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('short_description') as $error)
		                    <li>{{ $error  }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif		
		</div>
		<div class="col s12 m6">
			{!! Form::label('published','Published On:') !!}	
			{!! Form::text('published',old('published')) !!}	
			@if(count($errors->get('published')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('published') as $error)
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
