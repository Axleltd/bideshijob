<div class="form">
	{!! Form::label('name','Company Name:') !!}	
	{!! Form::text('name','') !!}	
	{!! Form::label('description','Description:') !!}
	{!! Form::textarea('description','') !!}
	 <div class="file-field input-field">
      <div class="btn">
        <span>Logo</span>
        {!! Form::file('logo') !!}        
      </div>      
    </div>    
</div>