<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;
use Session;
use Auth;
use App\Notifications\BusinessNotification;

class JobsController extends Controller
{
    protected $job;
	public function __construct()
	{
		$this->job = new Job;
	}
	public function index()
	{
		$jobs = $this->job->orderBy('created_at','DESC')->get();
		return view('admin.job.index')->with('jobs',$jobs);
	}
    public function featured($jobId)
    {
    	$job = $this->job->where('id',$jobId)->first();
    	$featured = $this->job->where('id',$jobId)->update(['featured'=>1]);
    	 
    	if(!$featured)
    	{
    		Session::flash('error', 'job is unsuccessfully featured');
    		return redirect()->back();
    	}
    	Session::flash('success', 'job is successfully activated');
    	Auth::user()->notify(new BusinessNotification('Congratulation Your job '.$job->name.' is featured'));
    	return redirect('/dashboard/job');

    }

    public function unFeatured($jobId)
    {
		$job = $this->job->where('id',$jobId)->first();
    	$active = $this->job->where('id',$jobId)->update(['featured'=>0]);
    	if(!$active)
    	{
    		Session::flash('error', 'job is unsuccessfully suspended');
    		return redirect()->back();
    		
    	}
    	Session::flash('success', 'job is successfully suspended');
    	Auth::user()->notify(new BusinessNotification('Sorry Your job '.$job->name.' is not featured'));
    	return redirect('/dashboard/job');    		
    }
    

    public function destroy($jobId)
    {
    	$job = $this->job->where('id',$jobId)->first();
    	$destroy = $this->job->destroy('id',$jobId);
    	if(!$destroy)
    	{
    		Session::flash('error', 'job is unsuccessfully deleted');
    		return redirect()->back();
    		
    	}
    	Session::flash('success', 'job is successfully deleted');
    	Auth::user()->notify(new BusinessNotification('Your job '.$job->name.' is deleted'));
    	return redirect('dashboard/job');
    }
}
