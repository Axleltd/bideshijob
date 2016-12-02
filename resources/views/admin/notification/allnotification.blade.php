@extends('layouts.dashboard')
@section('content')

<div class="application">
	<table>
        <thead>
          <tr>
              <th data-field="name">Name</th>
              <th data-field="email">Email</th>
              <th data-field="message">Message</th>              
              <th data-field="message">Link</th>              
          </tr>
        </thead>

        <tbody>
          @foreach($notifications as $notification)			
          @if($notification->data['for'] == 'admin')
        		<tr>          
        			<td>{{$notification->notifiable->name}}</td>
        			<td>{{$notification->notifiable->email}}</td>
        			<td>{{$notification->data['message']}}</td>				
        			<td><a href="/dashboard/{{$notification->data['name']}}">{{$notification->data['name']}}</a></td>				
        		</tr>
           @endif

          @endforeach
          {!! $notifications->links() !!}
        </tbody>
      </table>	
</div>


@stop@extends('layouts.dashboard')
@section('content')



@stop