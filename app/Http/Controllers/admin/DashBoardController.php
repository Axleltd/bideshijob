<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Training;
use Auth;
use App\Job;
use App\Profile;
use Illuminate\Notifications\DatabaseNotification;

class DashBoardController extends Controller
{
	protected $company;
    protected $training;
	protected $profile;

	public function __construct()
	{    
		$this->company = new Company;
        $this->training = new Training;
		$this->profile = new Profile;
	}

    public function index()
    {
        $id = Auth::user()->id;
    	$companies = $this->company->where(['user_id'=>$id])->get();    	                    	    	
        $job = Job::where('user_id',$id)->get();        
        $training = $this->training->where('user_id',$id)->get();
        $profile = $this->profile->where('user_id',$id)->first();
        
    	return view('admin.index')->with([
    		'companies'=>$companies,
            'job_count'=>count($job),
            'training_count'=>count($training),            
            'profile'=>$profile]);
    }
}
