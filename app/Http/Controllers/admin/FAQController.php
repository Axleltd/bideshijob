<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faq;

class FAQController extends Controller
{
	public function __construct()
	{		
		$this->faq = new Faq;
	}
	public function index()
	{
		$faq = $this->faq->orderBy('order')->get();
    	return view('admin.faq.index',compact('faq'));
	}
    public function create()
	{
		return view('admin.faq.create');
	}
	public function store(Request $request)
	{	
		$status = 0;
		if($request->status)
			$status = $request->status;
		$faq = $this->faq->create([
		'question' => $request->question,
        'answer' => $request->answer,
        'status' => $status,
        'order' => $request->order,
        ]);
        if($faq)
        {
        	return redirect('dashboard/faq');
        }
    	return redirect()->back()->withInput($request->toArray());
	}

	public function edit($id)
	{

		return view('admin.faq.edit')->with([
			'faq' => $this->faq->findOrFail($id)
			]);
	}


	public function update(Request $request,$id)
	{	
		$status = 0;
		if($request->status)
			$status = $request->status;	
		$faq = $this->faq->findOrFail($id)->update([
		'question' => $request->question,
        'answer' => $request->answer,
        'status' => $status,
        'order' => $request->order,
		]);
		if($faq)
        {
        	return redirect('dashboard/faq');
        }
    	return redirect()->back()->withInput($request->toArray());
	}

	public function destroy($id){
		if($this->faq->destroy('id',$id))
			return redirect('dashboard/faq');
		return redirect()->back();
	}

	public function active($id)
	{
		$faq = $this->faq->findOrFail($id);
		if($faq->update(['status'=>1]))
			return redirect('dashboard/faq');
		return redirect()->back();
	}

	public function suspend($id)
	{
		$faq = $this->faq->findOrFail($id);
		if($faq->update(['status'=>0]))
			return redirect('dashboard/faq');
		return redirect()->back();
	}

    
}
