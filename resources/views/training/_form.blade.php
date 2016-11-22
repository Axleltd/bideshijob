<div class="form">
	<div class="row">
		<div class="col s12 m6">
			{!! Form::label('title','Training Title:') !!}	
			{!! Form::text('title',old('title')) !!}	
		</div>
		<div class="col s12 m6">
			{!! Form::label('training_description','Description:') !!}
			{!! Form::textarea('training_description',old('training_description')) !!}
		</div>		 
		<div class="col s12 m6">
			{!! Form::label('categories','Categories:') !!}
			{!! Form::textarea('categories',old('categories')) !!}
		</div>		 
		<div class="col s12 m6">
			{!! Form::label('fees','Fees:') !!}
			{!! Form::text('fees',old('fees')) !!}
		</div>
		<div class="col s12 m6">
			{!! Form::label('from','From:') !!}
			{!! Form::date('from',old('from')) !!}
		</div>		 
		<div class="col s12 m6">
			{!! Form::label('to','To:') !!}
			{!! Form::date('to',old('to')) !!}
		</div>		 
		<div class="col s12 m6">
			{!! Form::label('quantity','Quantity:') !!}
			{!! Form::number('quantity',null,['class' => 'form-control','step'=>'any']) !!}
		</div>		 			 
</div>