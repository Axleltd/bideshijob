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
			{{--{!! Form::label('status','status:') !!}	
			{!! Form::number('status',old('status')) !!}--}}
			<div class="input-field col s12">
				<select name="status">
				  <option value="0" disabled selected>Choose your status</option>
				  <option value="1">Active</option>
				  <option value="0">Suspend</option>				  
				</select>				
			</div>	
		</div>

		<div class="col s12 m12">
			{!! Form::label('order','order:') !!}
			{!! Form::number('order',old('order')) !!}
		</div>
	</div>
</div>