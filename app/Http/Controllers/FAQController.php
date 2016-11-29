<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;

class FAQController extends Controller
{
	protected $faq;

	public function __construct()
	{		
		$this->faq = new Faq;
	}
	public function index()
    {
    	$faq = $this->faq->where('status',true)->orderBy('order')->get();
    	return view('frontend.faq',compact('faq'));
    }
	
}
