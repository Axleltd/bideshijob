<div class="form">
	<div class="row">
		<div class="col s12 m6 input-field">
			{!! Form::label('name','Name') !!}	
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
		<div class="col s12 m6 input-field">
			{!! Form::label('order','Order :') !!}	
			{!! Form::number('order',old('order')) !!}	
			@if(count($errors->get('order')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('order') as $error)
		                    <li>{{ $error  }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif		
		</div>
		<div class="input-field">
		    {!! Form::label('image', 'Image:', ['class' => 'control-label']) !!}
		    @if(isset($category->image))
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
			
			<input type="checkbox" class="filled-in" id="filled-in-box" {{-- checked="checked" --}} name="featured" />
             <label for="filled-in-box">Featured</label>	
			@if(count($errors->get('featured')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('featured') as $error)
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
