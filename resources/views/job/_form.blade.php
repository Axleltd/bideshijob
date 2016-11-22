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
		<div class="col s12 m6">
			{!! Form::label('categories','categories:') !!}
			{!! Form::text('categories',old('categories')) !!}
		</div>
		<div class="col s12 m6">
			{!! Form::label('about_job','about job:') !!}
			{!! Form::textarea('about_job',old('about_job')) !!}
		</div> 
		<div class="col s12 m6">
			{!! Form::label('facilities','Facilities:') !!}
			{!! Form::textarea('facilities',old('facilities')) !!}
		</div>
		<div class="col s12 m6">
			{!! Form::label('duties','duties:') !!}
			{!! Form::textarea('duties',old('duties')) !!}
		</div>     
		<div class="col s12 m6">
			{!! Form::label('salary','Salary :') !!}	
			{!! Form::number('salary',old('salary')) !!}	
		</div>
		<div class="col s12 m6">
			{!! Form::label('cost','cost :') !!}	
			{!! Form::number('cost',old('cost')) !!}	
		</div>
		<div class="col s12 m6">
			{!! Form::label('overtime','overtime :') !!}	
			{!! Form::number('overtime',old('overtime')) !!}	
		</div>   
		<div class="col s12 m6">
			{!! Form::label('quantity','quantity :') !!}	
			{!! Form::number('quantity',old('quantity')) !!}	
		</div>  
		<div class="col s12 m6">
			{!! Form::label('duty_hours','duty_hours :') !!}	
			{!! Form::number('duty_hours',old('duty_hours')) !!}	
		</div> 
		<div class="col s12 m6">
			Featured :
			{!! Form::label('featured','Yes :') !!}	
			{!! Form::radio('featured', '1') !!}
			
			{!! Form::label('featured','No :') !!}	
			{!! Form::radio('featured', '0') !!}
		</div>
		<div class="col s12 m6">
			{!! Form::label('requirement','requirements :') !!}	
			{!! Form::textarea('requirement',old('requirement')) !!}	
		</div>             
	</div>
</div>



