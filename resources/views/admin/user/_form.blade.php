
	<div class="user col s12 m5">
		<div class="form-group row">
		    {!! Form::label('logo', 'Logo:', ['class' => 'control-label']) !!}
		    @if(isset($profile->logo))
		        <div class="col-xs-2 thumb">
		            <a class="logo" href="#">
		                <img class="img-responsive" src="{{asset('image/profile/'.$profile->logo)}}"
		                     alt="{{$profile->logo}}" id="output">
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

		<div class="row">
			@if(isset($profile))
				<p>Name: {{$profile->user->name}}</p>
				<p>Email: <a href="mailto:{{$profile->user->email}}">{{$profile->user->email}}</a></p>
			@endif
		</div>
	</div>

	<div class="info col s12 m7">
		<div class="row">
			<div class="col s12 m6">
				{!! Form::label('first_name','First name:') !!}	
				{!! Form::text('first_name',old('first_name')) !!}	
				@if(count($errors->get('first_name')) > 0)
			        <div class="alert alert-danger">
			            <ul>
			                @foreach($errors->get('first_name') as $error)
			                    <li>{{ $error  }}</li>
			                @endforeach
			            </ul>
			        </div>
			    @endif		
			</div>
			<div class="col s12 m6">
				{!! Form::label('last_name','Last name:') !!}	
				{!! Form::text('last_name',old('last_name')) !!}	
				@if(count($errors->get('last_name')) > 0)
			        <div class="alert alert-danger">
			            <ul>
			                @foreach($errors->get('last_name') as $error)
			                    <li>{{ $error  }}</li>
			                @endforeach
			            </ul>
			        </div>
			    @endif		
			</div>
			<div class="col s12 m6">
				{!! Form::label('country','Country:') !!}	
				{!! Form::text('country',old('country')) !!}	
				@if(count($errors->get('country')) > 0)
			        <div class="alert alert-danger">
			            <ul>
			                @foreach($errors->get('country') as $error)
			                    <li>{{ $error  }}</li>
			                @endforeach
			            </ul>
			        </div>
			    @endif		
			</div>
			<div class="col s12 m6">
				{!! Form::label('phone','Phone:') !!}	
				{!! Form::text('phone',old('phone')) !!}	
				@if(count($errors->get('phone')) > 0)
			        <div class="alert alert-danger">
			            <ul>
			                @foreach($errors->get('phone') as $error)
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