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
    	$faq = $this;
    	return view('frontend.faq',compact('faq'));
    }
	public function create()
	{
		return view('admin.faq.create');
	}
	public function store(Request $request)
	{
		$faq = $this::create([
		'question' => $request->question,
        'answer' => $request->answer,
        'status' => $request->status,
        'order' => $request->order,
        ]);
	}

	public function edit($id)
	{
		
	}


	public function update(Request $request,$id)
	{
		$faq = $this::update([
		'question' => $request->question,
        'answer' => $request->answer,
        'status' => $request->status,
        'order' => $request->order,
		]);
	}

    
}
