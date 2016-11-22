<div class="contact">
	<div class="row">
		<div class="col s12 m6">
			{!! Form::label('email','Company Email:') !!}	
			{!! Form::text('email',(isset($company->contacts->email)? $company->contacts->email:old('email'))) !!}	
			@if(count($errors->get('email')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('email') as $error)
		                    <li>{{ $error  }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif		
		</div>	

		<div class="form-group col m6 s12 ">    
		    {!! Form::label('address',"Address", ['class' => 'control-label']) !!}
		    {!! Form::text('address',(isset($company->contacts->address)? $company->contacts->address:old('address')),['class' => 'form-control']) !!}
		    @if(count($errors->get('address')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('address') as $error)
		                    <li>{{ $error  }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif
		    <div id="map" style="height:300px !important; width:100%;"></div>
		</div>		

		    <div class="form-group col m6 s12">
		        {!! Form::label('country','Country',['class' => 'control-label']) !!}
		        {!! Form::text('country',(isset($company->contacts->country)? $company->contacts->country:old('country')),['class' => 'form-control']) !!}
		        @if(count($errors->get('country')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('country') as $error)
		                    <li>{{ $error  }}</li>
		                @endforeach
		            </ul>
		        </div>
		        @endif
		    </div>
        
		    {!! Form::hidden('latitude',1,['id'=>'latitude']) !!}
		    {!! Form::hidden('longitude',1,['id'=>'longitude']) !!}
	
		<div class="col s12 m6">
			{!! Form::label('website_link','Company Website:') !!}	
			{!! Form::text('website_link',(isset($company->contacts->website_link)? $company->contacts->website_link:old('website_link'))) !!}
			@if(count($errors->get('website_link')) > 0)
		        <div class="alert alert-danger">
		            <ul>
		                @foreach($errors->get('website_link') as $error)
		                    <li>{{ $error  }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif	
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