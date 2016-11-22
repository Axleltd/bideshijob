<div class="form">
	<div class="row">
		<div class="col s12 m12">
			{!! Form::label('question','question:') !!}	
			{!! Form::text('question',old('question')) !!}	
		</div>

		<div class="col s12 m12">
			{!! Form::label('answer','Answer:') !!}
			{!! Form::textarea('answer',old('answer')) !!}
		</div>
		<div class="col s12 m12">
			{!! Form::label('status','status:') !!}	
			{!! Form::number('status',old('status')) !!}	
		</div>

		<div class="col s12 m12">
			{!! Form::label('order','order:') !!}
			{!! Form::number('order',old('order')) !!}
		</div>
	</div>
</div>