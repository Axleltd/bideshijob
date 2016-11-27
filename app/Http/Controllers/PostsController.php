<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
class PostsController extends Controller
{
	public function __construct()
	{
		$this->middleware('isAdmin')->except('index','show');
	}
	public function show(Post $post)
	{
		return view('post.show')->with([
			'post' => $post
			]);
	}

	public function index()
	{
		return view('post.index')->with([
			'posts' => Post::where('published',1)->orderBy('published_at','DESC')->paginate(5)
			]);
	}

	public function create()
	{
		return view('post.create');
	}

	public function store(Request $request)
	{
		
		
		if(Post::create([
			'title' => $request->title,
			'content' => $request->content,
			'published' => $request->publish,
			'published_on' => $request->published_on,
			'short_description' => $request->short_description,
			'user_id' => Auth::user()->id,
			]))
		{
			return redirect('/blog');
		}
		return redirect()->back();
	}

	public function update(Request $request, Post $post)
	{
		if($post->user_id != Auth::user()->id || !Shinobi::isRole('admin'))
		{
			abort(403);
		}
		$update = $post->update([
			'title' => $request->title,
			'content' => $request->content,
			'published' => $request->publish,
			'published_on' => $request->published_on,
			'short_description' => $request->short_description
			]);
		if($update)
		{
			return redirect()->back();
		}
		return redirect()->back();
	}

	public function edit(Post $post)
	{
		return view('post.edit',compact('post'));
	}

	public function destroy(Post $post)
	{
		if($post->delete())
		{
			return redirect()->back();
		}
		return redirect()->back();
	}
}
