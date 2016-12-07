@extends('layouts.dashboard')
@section('content')

<div class="application">
	<table>
        <thead>
          <tr>
              <th data-field="id">Name</th>
              <th data-field="name">Email</th>
              <th data-field="name">Type</th>
              <th data-field="price">Download CV</th>
          </tr>
        </thead>

        <tbody>
          @foreach($applications as $application)
    			<tr>
    				<td>{{$application->full_name}}</td>
            <td>{{$application->email}}</td>
            <td>
              <?php 
                $open =false;
                $type = ''; 
              ?>

              @if($application->applicable_type == 'App\\Job' || $application->applicable_type == 'Job')
              <?php 
                    $open = true;
                    $companySlug = $application->applicable_type::findOrFail($application->applicable_id)->company->slug;
                    $slug = $application->applicable_type::findOrFail($application->applicable_id)->slug; 
                    $type = "Job";
                ?>
                <a href="{{ url('company/'.$companySlug.'/job/'.$slug) }}">
                @elseif($application->applicable_type == 'App\\Training' || $application->applicable_type == 'Training')
                 <?php 
                    $open = true;
                    $companySlug = $application->applicable_type::findOrFail($application->applicable_id)->company->slug;
                    $slug = $application->applicable_type::findOrFail($application->applicable_id)->slug; 
                    $type = "Training";
                  ?>
                <a href="{{ url('company/'.$companySlug.'/training/'.$slug) }}">
                @endif
                {{ $type }}::{{$application->applicable_type::findOrFail($application->applicable_id)->title}}
                
                @if($open)
                  </a>
                @endif
              
            </td>
    				
    				<td><a href="{{asset('file/'.$application->file)}}" target="_blank">CV</a></td>
    			</tr>
          @endforeach
          {!! $applications->links() !!}
        </tbody>
      </table>	
</div>

@stop