<div class="form">
	<div class="row">
		<div class="col s12 m6">
			{!! Form::label('title','Training Title:') !!}	
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
			{!! Form::label('training_description','Description:') !!}
			{!! Form::textarea('training_description',(isset($training->description)? $training->description:old('training_description'))) !!}
			@if(count($errors->get('training_description')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('training_description') as $error)
		                    <li>{{ $error  }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif		
		</div>		 
		<div class="col s12 m6">
			{!! Form::label('categories','Categories:') !!}
			{!! Form::textarea('categories',old('categories')) !!}
			@if(count($errors->get('categories')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('categories') as $error)
		                    <li>{{ $error  }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif		
		</div>		 
		<div class="col s12 m6">
			{!! Form::label('fees','Fees:') !!}
			{!! Form::text('fees',old('fees')) !!}
			@if(count($errors->get('fees')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('fees') as $error)
		                    <li>{{ $error  }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif		
		</div>
		<div class="col s12 m6">
			{!! Form::label('from','From:') !!}
			{!! Form::date('from',old('from')) !!}
			@if(count($errors->get('from')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('from') as $error)
		                    <li>{{ $error  }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif		
		</div>		 
		<div class="col s12 m6">
			{!! Form::label('to','To:') !!}
			{!! Form::date('to',old('to')) !!}
			@if(count($errors->get('to')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('to') as $error)
		                    <li>{{ $error  }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif		
		</div>		 
		<div class="col s12 m6">
			{!! Form::label('country','Quantity:') !!}
			{!! Form::number('quantity',null,['class' => 'form-control','step'=>'any']) !!}
			@if(count($errors->get('quantity')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('quantity') as $error)
		                    <li>{{ $error  }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif		
		</div>

		<div class="col s12 m6">
			{!! Form::label('country','Country:') !!}
			{!! Form::text('country',null,['class' => 'form-control','step'=>'any']) !!}
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
</div>