<div class="wrap">
    <div class="img-wrap">
      
    </div>
    <div class="text-wrap">
      <h5>{{$post->title}}</h5>
      @if($post->image)
        <img src="{{asset('image/blog/'.$post->image)}}" alt="" width="300" height="300">
        @else
        <img src="{{asset('image/no-image.png')}}" alt="" width="300" height="300">
      @endif
      <p><i class="fa fa-globe"></i>{{$post->short_description}}</p>
      <p><i class="fa fa-time"></i>Duration</p>
      <p>{{$post->description}}</p>
      <a href="{{ url('blog/'.$post->slug)}}" class="right">Go To</a>
    </div>
</div>