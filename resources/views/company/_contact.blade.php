<div class="contact">
	<div class="row">
		<div class="col s12 m6">
			{!! Form::label('email','Company Email:') !!}	
			{!! Form::text('email',(isset($company->contact->email)? $company->contact->email:null)) !!}			
		</div>	
		<div class="col s12 m6">
			{!! Form::label('address','Company Address:') !!}	
			{!! Form::text('address',(isset($company->contact->address)? $company->contact->address:null)) !!}
		</div>
		<div class="col s12 m6">
			{!! Form::label('website_link','Company Website:') !!}	
			{!! Form::text('website_link',(isset($company->contact->website_link)? $company->contact->website_link:null)) !!}	
		</div>
		<div class="col s12 m6">
			{!! Form::label('facebook_link','Company Facebook:') !!}	
			{!! Form::text('facebook_link',(isset($company->contact->socialMedia->facebook)? $company->contact->socialMedia->facebook:null)) !!}	
		</div>
		<div class="col s12 m6">
			{!! Form::label('twitter_link','Company Twitter:') !!}		
			{!! Form::text('twitter_link',(isset($company->contact->socialMedia->twitter)? $company->contact->socialMedia->twitter:null)) !!}
		</div>	
	</div>
</div>