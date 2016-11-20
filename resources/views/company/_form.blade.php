<div class="form">
	<div class="row">
		<div class="col s12 m6">
			{!! Form::label('name','Company Name:') !!}	
			{!! Form::text('name',old('name')) !!}	
		</div>
		<div class="col s12 m6">
			{!! Form::label('description','Description:') !!}
			{!! Form::textarea('description',old('description')) !!}
		</div>		  
	</div>
</div>
