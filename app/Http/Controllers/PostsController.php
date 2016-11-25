<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostsController extends Controller
{
	public function show(Post $post)
	{
		return view('post.show')->with([
			'post' => $post
			]);
	}

	public function index()
	{
		return view('post.index')->with([
			'posts' => Post::all()
			]);
	}

	public function create()
	{
		return view('post.create');
	}

	public function store(Request $request)
	{
		if(Post::create($request->toArray()))
		{
			return redirect()->back();
		}
		return redirect()->back();
	}

	public function update(Request $request, Post $post)
	{
		if($post->update($request->toArray()))
		{
			return redirect()->back();
		}
		return redirect()->back();
	}

	public function edit(Post $post)
	{
		return view('post.edit',$post);
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
