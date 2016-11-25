<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use Auth;
use App\User;
use App\Job;
use App\Training;
use Illuminate\Notifications\DatabaseNotification;

class UserController extends Controller
{	
	protected $company;
	protected $training;

	public function __construct()
	{	
		$this->middleware('auth');		
		$this->company = new Company;
		$this->training = new Training;
	}

    public function index()
    {    	
    	$companies = $this->company->where(['user_id'=>Auth::user()->id])->get();    	                    	    	
        $job = Job::where('user_id',Auth::user()->id)->get();        
        $training = $this->training->where('user_id',Auth::user()->id)->get();
        $notifications = DatabaseNotification::orderBy('created_at','DESC')->get();            	
    	return view('admin.index')->with([
    		'companies'=>$companies,
            'job_count'=>count($job),
            'training_count'=>count($training),
            'notifications'=>$notifications]);
    }

}
