@extends('layouts.app')

@section('title')
	Category | {{$category->name}}
@stop

@section('content')
	<section class="row training">
    <div class="wrap">
        <div class="section-title">
          
        <h3>All {{ $category->name }}</h3>
        </div>
      
      <div class="section-content">
        <ul class="lists row">
          <?php $d=0;?>
          @foreach($category->posts as $post)            
                 
            <li class="s12 m6 l4 col wow fadeInUp" data-wow-delay='{{$d}}s'>
              @include('post._indexPost')
            </li>
   
            <?php $d =$d+0.3;?>
          @endforeach
        </ul>
        {{-- $categories->links() --}}
      </div>
    </div>
  </section>
@stop