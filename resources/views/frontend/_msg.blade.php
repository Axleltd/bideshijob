<div class="message">
	<div class="row">
		<div class="col m6 s12">
			{!! Form::label('name','name:') !!}
			{!! Form::text('name',null)  !!}
		</div>
		<div class="col m6 s12">
			{!! Form::label('email','email: ') !!}
			{!! Form::text('email',null) !!}
		</div>
		<div class="col m6 s12">
			{!! Form::label('message','message: ') !!}
			{!! Form::textarea('message',null) !!}
		</div>
		
	</div>
	
</div>