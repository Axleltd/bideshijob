<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostAboutUsRequest;
use App\Http\Requests\PutAboutUsRequest;
use Illuminate\Support\Facades\Input;
use App\About;
use Session;
class AboutUsController extends Controller
{
	protected $about;
    public function __construct()
    {
    	$this->about = new About;
    }

    public function index()
    {    	
    	$about = $this->about->first();    	    	
    	return view('admin.about.index',compact('about'));
    }

    public function show()
    {    	
    	return $this->edit();
    }

    public function create()
    {
    	$about = $this->about->first();    	
    	if($about)
    		return redirect()->back();	
    	return view('admin.about.create');
    }

    public function store(PostAboutUsRequest $request)
    {
    	$textToStore = nl2br(htmlentities($request->content, ENT_QUOTES, 'UTF-8'));    	
    	$image = $this->fileUpload($request,null);  
      
    	if($this->about->create(['content'=>$textToStore,'image'=>$image]))
    	{
    		Session::flash('success','About us content created');
    		return redirect()->to('/dashboard/about');
    	}
    	Session::flash('error','About us content creating failed');
    	return redirect()->back();

    }

    public function edit()
    {    	
    	$about = $this->about->first();
    	return view('admin.about.edit',compact('about'));
    }

    public function update(PutAboutUsRequest $request)
    {
    	$textToStore = nl2br(htmlentities($request->content, ENT_QUOTES, 'UTF-8'));    	

    	$about = $this->about->first();
    	$logoName = $about->image;
    	if($request->image)
            $logoName = $this->fileUpload($request,$logoName);  
         $about = $about->update(['content'=>$textToStore,'image'=>$logoName]);          
    	if($about)
    	{
    		Session::flash('success','About us content updated');
    		return redirect()->to('/dashboard/about');
    	}
    	Session::flash('error','About us updating failed');
    	return redirect()->back();

    }

    public function destroy($id)
    {
    	if($this->about->destroy('id',$id))
    	{
    		Session::flash('success','About us content deleted');
    		return redirect()->to('/dashboard/about');
    	}
    	Session::flash('error','About us content deleting failed');
    	return redirect()->back();
    }

    public function fileUpload(Request $request,$logoName)
    {
        $files=Input::file('image');        
        $destinationPath = 'image/about'; // upload path
        $fileName = $files->getClientOriginalName();
        $fileExtension = '.'.$files->getClientOriginalExtension();
        if(!$logoName)        
            $logoName = md5($fileName.microtime()).$fileExtension;
        $files->move($destinationPath, $logoName);    

        return $logoName;
        // return $files->store('image');
    }
}
