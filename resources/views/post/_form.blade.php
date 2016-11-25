<div class="form">
	<div class="row">
		<div class="col s12 m6 input-field">
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
		    {!! Form::label('image', 'Image:', ['class' => 'control-label']) !!}
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
		<div class="col s12 m6 input-field">
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
		<div class="col s12 m6 input-field">
			{!! Form::label('short_description','Description:') !!}	
			{!! Form::textarea('short_description',old('short_description')) !!}	
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
			{!! Form::date('published',old('published'),['class'=>'datepicker']) !!}	
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
@push('script')
	<script type="text/javascript">
	  $('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 15 // Creates a dropdown of 15 years to control year
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
