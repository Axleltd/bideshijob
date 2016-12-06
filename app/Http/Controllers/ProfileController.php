<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Auth;
use Session;
use App\Http\Requests\PostProfileRequest;
use App\Http\Requests\PutProfileRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Notifications\DatabaseNotification;

class ProfileController extends Controller
{
	protected $profile;

	public function __construct()
	{		
        $this->middleware('auth');
		$this->profile = new Profile;
	}

    public function index()
    {    	
    	$profile = $this->profile->where('user_id',Auth::user()->id)->first();
    	return view('admin.user.user',compact('profile'));    	
    }

    public function create()
    {
        $profile = $this->profile->where('user_id',Auth::user()->id)->first();
        if($profile)
        {
            return redirect()->back();
            
        }
        return view('admin.user.create');
    }

    public function store(PostProfileRequest $request)
    {           
        $logo ="";
        if($request->logo)
            $logo = $this->fileUpload($request,'');
        $profile = $this->profile->create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'country'=>$request->country,
            'phone'=>$request->phone,
            'logo'=>$logo,
            'user_id'=>Auth::user()->id]);            
        if($profile)
        {
            Session::flash('success','Profile created');
            return redirect('/profile/user');
        }
        Session::flash('error','Profile creating failed');
        return redirect()->back();

    }

    public function edit($id)
    {
        $profile = $this->profile->where('id',$id)->first();        
        return view('admin.user.edit',compact('profile'));
    }

    public function update(PutProfileRequest $request,$id)
    {
        $profile = $this->profile->findOrFail($id);        
        $logo =$profile->logo;
        if($request->logo)
            $logo = $this->fileUpload($request,$logo);
        $profile = $profile->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'country'=>$request->country,
            'phone'=>$request->phone,
            'logo'=>$logo
            ]);            
        if($profile)
        {
            Session::flash('success','Profile updated');
            return redirect('/profile/user');
        }
        Session::flash('error','Profile updating failed');
        return redirect()->back();   
    }

    public function notification()
    {        
        $notifications = DatabaseNotification::where('data','LIKE','%user%')->where('notifiable_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(10);    
        
        if(count($notifications)>0)    
            $notifications->markAsRead();
        return view('admin.notification.notification',compact('notifications'));
    }

    public function singleNotification($id)
    {        
        $notification = DatabaseNotification::findOrFail($id);
        $notification->markAsRead();
        return redirect('/profile/'.$notification->data['name']);
    }

     public function fileUpload(Request $request,$logoName)
    {
        $files=Input::file('logo');        
        $destinationPath = 'image/profile'; // upload path
        $fileName = $files->getClientOriginalName();
        $fileExtension = '.'.$files->getClientOriginalExtension();
        if(!$logoName)        
            $logoName = md5($fileName.microtime()).$fileExtension;
        $files->move($destinationPath, $logoName);    

        return $logoName;
        // return $files->store('image');
    }


}
