<div class="form">
	<div class="row">
		<div class="col s12 m6">
			{!! Form::label('title','Job Title:') !!}	
			{!! Form::text('title',old('title')) !!}
			@if(count($errors->get('title')) > 0)
			        <div class="error">
			            <ul>

			                @foreach($errors->get('title') as $error)
			                    <li>{{ $error  }}</li>
			                @endforeach
			            </ul>
			        </div>
			@endif
		</div>

		<div class="col s12 m6 logo">

		   	{!! Form::label('image', 'Image:', ['class' => 'control-label']) !!}

		    @if(!empty($job->image))
		        <div class="col-xs-2 thumb">
		            <a class="logo" href="#">
		                <img class="img-responsive" src="{{asset('image/job/'.$job->image)}}"
		                     alt="{{$job->title}}" id="output">
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

		<div class="col s12 m6">
			{!! Form::label('description','Description:') !!}
			{!! Form::textarea('description',old('description')) !!}
			@if(count($errors->get('description')) > 0)
			        <div class="error">
			            <ul>

			                @foreach($errors->get('description') as $error)
			                    <li>{{ $error  }}</li>
			                @endforeach
			            </ul>
			        </div>
			@endif
		</div>
		<div class="col s12 m6">
			{!! Form::label('categories','categories:') !!}
			{!! Form::text('categories',old('categories')) !!}
			@if(count($errors->get('categories')) > 0)
			        <div class="error">
			            <ul>

			                @foreach($errors->get('categories') as $error)
			                    <li>{{ $error  }}</li>
			                @endforeach
			            </ul>
			        </div>
			@endif
		</div>
		<div class="col s12 m6">
			{!! Form::label('about_job','about job:') !!}
			{!! Form::textarea('about_job',old('about_job')) !!}
			@if(count($errors->get('about_job')) > 0)
			        <div class="error">
			            <ul>

			                @foreach($errors->get('about_job') as $error)
			                    <li>{{ $error  }}</li>
			                @endforeach
			            </ul>
			        </div>
			@endif
		</div> 
		<div class="col s12 m6">
			{!! Form::label('facilities','Facilities:') !!}
			{!! Form::textarea('facilities',old('facilities')) !!}
			@if(count($errors->get('facilities')) > 0)
			        <div class="error">
			            <ul>

			                @foreach($errors->get('facilities') as $error)
			                    <li>{{ $error  }}</li>
			                @endforeach
			            </ul>
			        </div>
			@endif
		</div>
		<div class="col s12 m6">
			{!! Form::label('duties','duties:') !!}
			{!! Form::textarea('duties',old('duties')) !!}
			@if(count($errors->get('duties')) > 0)
			        <div class="error">
			            <ul>

			                @foreach($errors->get('duties') as $error)
			                    <li>{{ $error  }}</li>
			                @endforeach
			            </ul>
			        </div>
			@endif
		</div>     
		<div class="col s12 m6">
			{!! Form::label('salary','Salary :') !!}	
			{!! Form::number('salary',old('salary')) !!}
			@if(count($errors->get('salary')) > 0)
			        <div class="error">
			            <ul>

			                @foreach($errors->get('salary') as $error)
			                    <li>{{ $error  }}</li>
			                @endforeach
			            </ul>
			        </div>
			@endif	
		</div>
		<div class="col s12 m6">
			{!! Form::label('cost','cost :') !!}	
			{!! Form::number('cost',old('cost')) !!}
			@if(count($errors->get('cost')) > 0)
			        <div class="error">
			            <ul>

			                @foreach($errors->get('cost') as $error)
			                    <li>{{ $error  }}</li>
			                @endforeach
			            </ul>
			        </div>
			@endif	
		</div>
		<div class="col s12 m6">
			{!! Form::label('overtime','overtime :') !!}	
			{!! Form::number('overtime',old('overtime')) !!}
			@if(count($errors->get('overtime')) > 0)
			        <div class="error">
			            <ul>

			                @foreach($errors->get('overtime') as $error)
			                    <li>{{ $error  }}</li>
			                @endforeach
			            </ul>
			        </div>
			@endif	
		</div>   
		<div class="col s12 m6">
			{!! Form::label('quantity','quantity :') !!}	
			{!! Form::number('quantity',old('quantity')) !!}
			@if(count($errors->get('quantity')) > 0)
			        <div class="error">
			            <ul>

			                @foreach($errors->get('quantity') as $error)
			                    <li>{{ $error  }}</li>
			                @endforeach
			            </ul>
			        </div>
			@endif	
		</div>  
		<div class="col s12 m6">
			{!! Form::label('duty_hours','duty_hours :') !!}	
			{!! Form::number('duty_hours',old('duty_hours')) !!}	
			@if(count($errors->get('duty_hours')) > 0)
			        <div class="error">
			            <ul>

			                @foreach($errors->get('duty_hours') as $error)
			                    <li>{{ $error  }}</li>
			                @endforeach
			            </ul>
			        </div>
			@endif
		</div> 		
		<div class="col s12 m6">
			{!! Form::label('requirement','requirements :') !!}	
			{!! Form::textarea('requirement',old('requirement')) !!}	
			@if(count($errors->get('requirement')) > 0)
			        <div class="error">
			            <ul>

			                @foreach($errors->get('requirement') as $error)
			                    <li>{{ $error  }}</li>
			                @endforeach
			            </ul>
			        </div>
			@endif
		</div> 
		<div class="col s12 m6">
			{!! Form::label('country','Country :') !!}	
			{!! Form::textarea('country',old('country')) !!}
			@if(count($errors->get('country')) > 0)
			        <div class="error">
			            <ul>

			                @foreach($errors->get('country') as $error)
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
