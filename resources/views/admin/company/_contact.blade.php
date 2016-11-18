<div class="contact">
	<div class="row">
		<div class="col s12 m6">
			{!! Form::label('email','Company Email:') !!}	
			{!! Form::text('email',$company->contact->email) !!}			
		</div>	
		<div class="col s12 m6">
			{!! Form::label('address','Company Address:') !!}	
			{!! Form::text('address',$company->contact->address) !!}
		</div>
		<div class="col s12 m6">
			{!! Form::label('website_link','Company Website:') !!}	
			{!! Form::text('website_link',$company->contact->website_link) !!}	
		</div>
		<div class="col s12 m6">
			{!! Form::label('facebook_link','Company Facebook:') !!}	
			{!! Form::text('facebook_link',$company->contact->socialMedia->facebook) !!}	
		</div>
		<div class="col s12 m6">
			{!! Form::label('twitter_link','Company Twitter:') !!}		
			{!! Form::text('twitter_link',$company->contact->socialMedia->twitter) !!}
		</div>	
	</div>
</div>