{{-- <div class="search">
	<div class="row">
		<div class="col m6 s12">
			{!! Form::label('address','Address:') !!}
			{!! Form::text('address',null)  !!}
		</div>
		<div class="col m6 s12">
			{!! Form::label('title','Title: ') !!}
			{!! Form::text('title',null) !!}
		</div>
		
	</div>
	
</div>
 --}}

<input type="text" class="title" name="title" placeholder="search">
 <input type="text" class="location" name="country" placeholder="country">
 @push('script')
<script>
	jQuery(document).ready(function($) {
		$('.location').autocomplete({
				data:{
				  @include('company._countryList')
			}
		});
		
	});
</script>
@endpush