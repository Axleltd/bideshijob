<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
class SiteController extends Controller
{
	protected $job;
	public function __construct()
	{
		$this->job = new Job;
	}
    public function getJobs()
    {        
    	$jobs = $this->job->with(['company'=> function ($query) {
            $query->where('status',1);
        }])->paginate(10);        
    	return view('job.index',compact('jobs'));
    }
    public function getAbout()
    {        
    	return view('site.about')->with('about',\App\About::first());
    }
}
