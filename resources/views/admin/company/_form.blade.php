<div class="form">
	<div class="row">
		<div class="col s12 m6">
			{!! Form::label('name','Company Name:') !!}	
			{!! Form::text('name','') !!}	
		</div>
		<div class="col s12 m6">
			{!! Form::label('description','Description:') !!}
			{!! Form::textarea('description','') !!}
		</div>
		 <div class="file-field input-field">
	      <div class="btn">
	        <span>Logo</span>
	        {!! Form::file('logo') !!}        
	      </div>      
	    </div>    
	</div>
</div>