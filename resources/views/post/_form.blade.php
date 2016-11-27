<div class="form">
	<div class="row">
		<div class="col s12 m6 input-field">
			{!! Form::text('title',old('title')) !!}	
			{!! Form::label('title','Post Title:') !!}	
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
		@if(Shinobi::isRole('admin'))
			<div class="col s12 m6 input-field">
				 <div class="input-field col s12">
				    <select>
	      				<option value="" disabled @if(!isset($post)) selected @endif>Choose your option</option>
				      @foreach($categories as $category)
							<option value="{{ $category->id }}" 
							@if(isset($post) && $post->category_id !== null && $post->category_id == $category->id) 	selected 
							@endif
							>{{ $category->name }}</option>
				      @endforeach
				    </select>
				    <label>Category</label>
				  </div>
			</div>
		@else
			{!! Form::hidden('categoy_id', $categories->id) !!}
		@endif
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
		<div class="input-field">
		    @if(isset($post->image))
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
		  <div class="file-field input-field">
		  	<div class="btn">
		  		<span>Image</span>
		        {!! Form::file('image', array('onchange'=>'loadFile(event)','id'=>'image')) !!}
		  	</div>
		  	 <div class="file-path-wrapper">
		        <input class="file-path validate" type="text">
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
		<div class="col s12 m6 input-field">
			{!! Form::textarea('content',old('content')) !!}	
			{!! Form::label('content','Content:') !!}	
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
		<div class="col s12 m6 input-field">
			{!! Form::textarea('short_description',old('short_description')) !!}	
			{!! Form::label('short_description','Description:') !!}	
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
		 <!-- Switch -->
		 <div class="input-field col s12 m6 ">
		 	<div class="switch">
		    <label>
		      Publish
		      <input type="checkbox" name="publish">
		      <span class="lever"></span>
		      Save Only
		    </label>
		  </div>	
		 </div>
		  
		<div class="input-field col s12 m6">
			{!! Form::label('published_on','Publish On:') !!}	
			{!! Form::date('published_on',old('published_on'),['class'=>'datepicker']) !!}	
			@if(count($errors->get('published_on')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('published_on') as $error)
		                    <li>{{ $error  }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif		
		</div>
	</div>
</div>
@push('script')
	<script type="text/javascript">
	  $('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 15, // Creates a dropdown of 15 years to control year
	    format: 'yyyy-mm-dd'
	    
	  });
	</script>
@endpush
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
