<div class="notification">
	<ul>
		@foreach($notifications as $notification)
			
			<li>
				<a href="{{ url('dashboard/company')}}" class="{{ ($notification->read_at) ?'read': 'notread' }} btn">{{$notification->data['message']}}</a>
			</li>

		@endforeach
	</ul>
</div>
