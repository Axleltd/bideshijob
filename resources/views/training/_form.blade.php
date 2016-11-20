<div class="form">
	<div class="row">
		<div class="col s12 m6">
			{!! Form::label('title','Training Title:') !!}	
			{!! Form::text('title',old('title')) !!}	
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
			{!! Form::label('quantity','Quantity:') !!}
			{!! Form::number('quantity',null,['class' => 'form-control','step'=>'any']) !!}
		</div>		 			 
</div>