<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Session;

class MessageController extends Controller
{
  protected $message;

	public function __construct()
	{
		$this->message = new Message;
	}
	public function index()
    {
    	$message = $this->message->get();
    	return view('message.index',compact('message'));
    }
	public function create()
	{
		return view('frontend.contact_us');
	}
	public function store(Request $request)
	{
		$message = $this->message->create([
			   'name' => $request->name,
	        'email' => $request->email,
	        'messages' => $request->message,
        ]);
        if($message)
        {
          Session::flash('success','Message sent');
        	return redirect('contact');
        }
        Session::flash('error','Message failed');
    	return redirect()->back()->withInput($request->toArray());
	}
	public function show($id)
    {
    	$message = $this->message->findOrFail($id);
    	$this->seen($id);
     
        return view('message.show',compact('message'));
    }


    protected function seen($id)
    {
       	$message = $this->message->findOrFail($id);
       	$message->seen = 1;
        return $message->save();
    }
    protected function unSeen($id)
    {
       	$message = $this->message->findOrFail($id);
       	$message->seen = 0;
        return $message->save();
    }
    public function markSeen($id)
    {
       	if($this->seen($id))
       	{

       		return redirect()->back();
       	}
   		return redirect()->back();
    }
    public function markUnSeen($id)
    {
       	if($this->unSeen($id))
       	{
       		
       		return redirect()->back();
       	}
   		return redirect()->back();
    }
}
