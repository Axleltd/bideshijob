<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Http\Requests\PostBlogRequest;
use App\Http\Requests\PutBlogRequest;
use Illuminate\Support\Facades\Input;
use Shinobi;

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
			'posts' => Post::where(['published'=>1,'status'=>1])->orderBy('published_on','DESC')->paginate(5)
			]);
	}

	public function create()
	{	

		return view('post.create');
	}

	public function store(PostBlogRequest $request)
	{

		$logoName = '';
		if($request->image)
			$logoName = $this->fileUpload($request,$logoName);
		if(Post::create([
			'title' => $request->title,
			'content' => $request->content,
			'category_id' => $request->category,
			'image' => $logoName,
			'published' => ($request->published == 'on') ? 1 : 0,
			'published_on' => ($request->published_on == '')? \Carbon\Carbon::now() : $request->published_on,
			'short_description' => $request->short_description,
			'user_id' => Auth::user()->id,
			]))
		{
			return redirect('/dashboard/posts');
		}
		return redirect()->back();
	}

	public function update(PutBlogRequest $request, Post $post)
	{

		if($post->user_id != Auth::user()->id || !Shinobi::isRole('admin'))
		{
			abort(403);
		}
		$logoName=$post->image;
		if($request->image)
			$logoName = $this->fileUpload($request,$logoName);
		$update = $post->update([
			'title' => $request->title,
			'content' => $request->content,
			'category_id' => $request->category,
			'image' => $logoName,
			'published' => ($request->published == 'on') ? 1 : 0,
			'published_on' => ($request->published_on == '')? \Carbon\Carbon::now() : $request->published_on,
			'short_description' => $request->short_description
			]);
		if($update)
		{
			return redirect('/dashboard/posts');
		}
		return redirect()->back()->withInput($request->toArray());
	}

	public function edit(Post $post)
	{
		return view('post.edit',compact('post'));
	}

	protected function fileUpload(Request $request,$logoName)
    {
        $files=Input::file('image');        
        $destinationPath = 'image/blog'; // upload path
        $fileName = $files->getClientOriginalName();
        $fileExtension = '.'.$files->getClientOriginalExtension();
        if(!$logoName)        
            $logoName = md5($fileName.microtime()).$fileExtension;
        $files->move($destinationPath, $logoName);    

        return $logoName;
        // return $files->store('image');
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
