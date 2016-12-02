<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;
use Session;
use Auth;
use App\Notifications\BusinessNotification;
use App\Notifications\NotificationPost;

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
    		Session::flash('error', 'job featuring failed');
    		return redirect()->back();
    	}
    	Session::flash('success', 'job featured');
    	$job->user->notify(new BusinessNotification('Congratulation Your job '.$job->name.' is featured','job','user'));
    	return redirect('/dashboard/job');

    }

    public function unFeatured($jobId)
    {
		$job = $this->job->where('id',$jobId)->first();
    	$active = $this->job->where('id',$jobId)->update(['featured'=>0]);
    	if(!$active)
    	{
    		Session::flash('error', 'job unfeaturing failed');
    		return redirect()->back();
    		
    	}
    	Session::flash('success', 'job unfeatured');
    	$job->user->notify(new BusinessNotification('Sorry Your job '.$job->name.' is not featured','job','user'));
    	return redirect('/dashboard/job');    		
    }
    

    public function destroy($jobId)
    {
    	$job = $this->job->where('id',$jobId)->first();
    	$destroy = $this->job->destroy('id',$jobId);
    	if(!$destroy)
    	{
    		Session::flash('error', 'job deleting failed');
    		return redirect()->back();
    		
    	}
    	Session::flash('success', 'job deleted');        
    	$job->user->notify(new BusinessNotification('Your job '.$job->name.' is deleted','job','user'));
    	return redirect('dashboard/job');
    }
}
