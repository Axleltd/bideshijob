@extends('layouts.dashboard')
@section('content')

<div class="application">
	<table>
        <thead>
          <tr>
              <th data-field="id">Name</th>
              <th data-field="name">Email</th>
              <th data-field="price">Download CV</th>
          </tr>
        </thead>

        <tbody>
          @foreach($applications as $application)
			
			<tr>
				<td>{{$application->full_name}}</td>
				<td>{{$application->email}}</td>
				<td><a href="{{asset('file/'.$application->file)}}" target="_blank">CV</a></td>
			</tr>

          @endforeach
          {{--{!! $applications->link() !!}--}}
        </tbody>
      </table>	
</div>

@stop