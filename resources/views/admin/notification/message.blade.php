@extends('layouts.dashboard')
@section('content')

<div class="application">
	<table>
        <thead>
          <tr>
              <th data-field="id">Name</th>
              <th data-field="name">Email</th>
              <th data-field="price">Message</th>
          </tr>
        </thead>

        <tbody>
          @foreach($messages as $message)
			
			<tr>
				<td>{{$message->name}}</td>
				<td>{{$message->email}}</td>
				<td>{{$message->messages}}</td>
			</tr>

          @endforeach
          {!! $messages->links() !!}
        </tbody>
      </table>	
</div>


@stop