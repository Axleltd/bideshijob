<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
class SubscriberController extends Controller
{
	protected $subscriber;
	public function __construct(Subscriber $subscriber)
	{
		$this->subscriber = $subscriber;
	}
    public function index()
    {
    	$subscriber = $this->subscriber->all();
    	return view('admin.subscriber.index')->with('subscribers',$subscriber);
    }

    public function store(Request $request)
    {
		if($request->cv)
			$file = $this->fileUpload($request);
    	$subscriber = $this->subscriber->create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'contact' => $request->email,
    		'file' => $file,
    		]);
    	return view('admin.subscriber.index')->with('subscribers',$subscriber);
    }

    public function verify($uuid)
    {
		$subscriber = $this->subscriber->where('activation_token',$uuid);
		$id = ($subscriber->first()) ? $subscriber->first() : null;
		if($subscriber->update(['verified' => true]))
		{
			session('success','Your subscription has been successfully verified')
		}
		return view('subscription.verified');
    }


	protected function fileUpload(Request $request)
    {
        $files=Input::file('cv');        
        $destinationPath = 'subscriber'; // upload path
        $fileName = $files->getClientOriginalName();
        $fileExtension = '.'.$files->getClientOriginalExtension();
        $files->move($destinationPath, $logoName);    
        return md5($fileName.microtime()).$fileExtension;
        // return $files->store('image');
    }
}
