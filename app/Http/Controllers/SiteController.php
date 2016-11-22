<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
class SiteController extends Controller
{
    public function getJobs()
    {
    	$jobs = Job::all();
    	return view('job.index',compact('jobs'));
    }
    public function getAbout()
    {
    	return view('site.about');
    }
}
