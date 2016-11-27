<div class="wrap">
                <div class="img-wrap">
                  
                </div>
                <div class="text-wrap">
                  <h5>{{$category->name}}</h5>
                  <p><i class="fa fa-globe"></i>{{$category->slug}}</p>
                  <p>{{ $category->order }}</p>
                  <p>Published {{ $category->published }}</p>
                  <a href="{{ url('blog/category/'.$category->slug)}}" class="right">Go To</a>
                </div>
              </div>