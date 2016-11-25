@extends('layouts.app')

@section('title')
	Search Post
@stop

@section('content')
		
	<div class="search">
		<div class="search-box wow fadeIn">
	        {!! Form::open([
	                'action' => '\App\Http\Controllers\SearchController@postSearch','method'=>'get']) !!}
	          <input type="text" class="title" name="title" placeholder="Job / Training">
	          <input type="text" class="location" name="address" placeholder="country">
	          <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
	        </form>
      	</div>
		<div class="section-title">
	        <h3 class="wow fadeIn">Search Results</h3>
	    </div>
	<section class="jobs row">	    
		<div class="section-content">
	        <ul class="lists row">
	          <?php $d=0;?>
	          @foreach($posts as $post)            
	            <h3 class="wow fadeIn">Posts</h3>        
	            <li class="s12 m6 l4 col wow fadeInUp" data-wow-delay='{{$d}}s'>
	             @include('post._indexPost')
	            </li>
	            <?php $d =$d+0.3;?>
	          @endforeach
	        </ul>
	        {{ $posts->links() }}
	      </div>
      </section>		
	</div>

@stop