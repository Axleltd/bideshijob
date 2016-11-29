<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;
class NewsletterController extends Controller
{

	public function __construct(Newsletter $newsletter)
	{
		$this->newsletter = $newsletter;
	}
    public function index()
    {
    	$newsletters = $this->newsletter->paginate(5);
    	return view('admin.newsletter.index')->with('newsletters',$newsletters);
    }

    public function store()
    {
    	
    }
}
