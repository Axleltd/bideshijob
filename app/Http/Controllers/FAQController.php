<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;

class FAQController extends Controller
{
	protected $faq;

	public function __construct()
	{
		//$this->middleware('auth');
		$this->faq = new Faq;
	}
	public function index()
    {
    	$faq = $this->faq->where('status',true)->orderBy('order')->get();
    	return view('frontend.faq',compact('faq'));
    }
	public function create()
	{
		return view('admin.faq.create');
	}
	public function store(Request $request)
	{
		$faq = $this->faq->create([
		'question' => $request->question,
        'answer' => $request->answer,
        'status' => $request->status,
        'order' => $request->order,
        ]);
        if($faq)
        {
        	return redirect('faq');
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
		$faq = $this->faq->findOrFail($id)->update([
		'question' => $request->question,
        'answer' => $request->answer,
        'status' => $request->status,
        'order' => $request->order,
		]);
		if($faq)
        {
        	return redirect('faq');
        }
    	return redirect()->back()->withInput($request->toArray());
	}

    
}
