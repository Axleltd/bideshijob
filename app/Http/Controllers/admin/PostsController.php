<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Auth;
use Session;
use App\Notifications\BusinessNotification;
class PostsController extends Controller
{
	protected $post;
	public function __construct()
	{
		$this->post = new Post;
	}
	public function index()
	{
		$posts = $this->post->orderBy('created_at','DESC')->get();
		return view('admin.post.index')->with('posts',$posts);
	}
   
    public function active($id)
    {
    	$company = $this->post->where('id',$id)->first();
    	$active = $this->post->where('id',$id)->update(['status'=>1]);
    	 
    	if(!$active)
    	{
    		Session::flash('error', 'Post activating failed');
    		return redirect()->back();
    	}
    	Session::flash('success', 'Post activated');
    /*	Auth::user()->notify(new BusinessNotification('Congratulation Your Company '.$company->name.' is approved'));*/
    	return redirect('/dashboard/posts');

    }

    public function suspend($id)
    {
		$company = $this->post->where('id',$id)->first();
    	$active = $this->post->where('id',$id)->update(['status'=>0]);
    	if(!$active)
    	{
    		Session::flash('error', 'Post suspending failed');
    		return redirect()->back();
    		
    	}
    	Session::flash('success', 'Post suspended');
    	/*Auth::user()->notify(new BusinessNotification('Sorry Your Company '.$company->name.' is Suspended'));*/
    	return redirect('/dashboard/posts');    		
    }

    public function destroy($companyId)
    {
    	$destroy = $this->posts->where('id',$companyId)->first();
    	if(!$destroy)
    	{
    		Session::flash('error', 'Post deleting failed');
    		return redirect()->back();
    	}
    	Session::flash('success', 'Post deleted');
    	return redirect('dashboard/posts');
    }
}
