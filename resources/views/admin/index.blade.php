<div class="notification">
	<ul>
		@foreach($notifications as $notification)

			<li>{{$notification->data}}</li>

		@endforeach
	</ul>
</div>