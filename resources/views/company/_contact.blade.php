<div class="contact">
	<div class="row">
		<div class="col s12 m6">
			{!! Form::label('email','Company Email:') !!}	
			{!! Form::text('email',(isset($company->contacts->email)? $company->contacts->email:null)) !!}			
		</div>	
		<div class="col s12 m6">
			{!! Form::label('address','Company Address:') !!}	
			{!! Form::text('address',(isset($company->contacts->address)? $company->contacts->address:null)) !!}
		</div>
		<div class="col s12 m6">
			{!! Form::label('website_link','Company Website:') !!}	
			{!! Form::text('website_link',(isset($company->contacts->website_link)? $company->contacts->website_link:null)) !!}	
		</div>
		<div class="col s12 m6">
			{!! Form::label('facebook_link','Company Facebook:') !!}	
			{!! Form::text('facebook_link',(isset($company->contacts->socialMedia->facebook)? $company->contacts->socialMedia->facebook:null)) !!}	
		</div>
		<div class="col s12 m6">
			{!! Form::label('twitter_link','Company Twitter:') !!}		
			{!! Form::text('twitter_link',(isset($company->contacts->socialMedia->twitter)? $company->contacts->socialMedia->twitter:null)) !!}
		</div>	
	</div>
</div>