<div class="form">
	<div class="row">
		<div class="col s12 m6">
			{!! Form::label('title','Job Title:') !!}	
			{!! Form::text('title',old('title')) !!}	
		</div>
		<div class="col s12 m6">
			{!! Form::label('description','Description:') !!}
			{!! Form::textarea('description',old('description')) !!}
		</div>    
	</div>
</div>