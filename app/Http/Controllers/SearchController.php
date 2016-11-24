<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Contact;
use App\Training;
use App\Job;
class SearchController extends Controller
{
    public function companySearch(Request $request)
    {	    	


    	$company = Company::where('status',1)	    
    	->where('name','LIKE','%'.$request->company.'%')
	    ->whereHas('contacts', function ($query) use ($request) {
	        $query->where('country', 'like', '%'.$request->country.'%');
	    })
	    ->orderBy('created_at','DESC')
	    ->paginate(20);

	    if($company)
	    {
	    	return view('company.index',compact('company'));
	    }	
	    return redirect()->back();    
    	
    }

    public function trainingSearch(Request $request)
    {    	
    	$training = Training::where('title','LIKE','%'.$request->title.'%')
	    ->whereHas('company', function ($query) use ($request) {
	        $query->where('status',1)
	        		->whereHas('contacts', function ($query) use ($request) {
			        $query->where('country', 'like', '%'.$request->country.'%');
			    });
	    })
	    ->orderBy('created_at','DESC')
	    ->paginate(20);
	    
	    if($training)
	    {
	    	return view('training.index',compact('training'));
	    }

	    return redirect()->back();	  
    }

    public function jobSearch(Request $request)
    {    
    	$company = 'search';
    	$jobs = Job::where('title','LIKE','%'.$request->title.'%')
	    ->whereHas('company', function ($query) use ($request) {
	        $query->where('status',1)
	        		->whereHas('contacts', function ($query) use ($request) {
			        $query->where('country', 'like', '%'.$request->country.'%');
			    });
	    })
	    ->orderBy('created_at','DESC')
	    ->paginate(20);	    	    
	    if($jobs)
	    {
	    	return view('job.index',compact('jobs','company'));
	    }	  	
    }

    public function allSearch(Request $request)
    {

    	$jobs = Job::where('title','LIKE','%'.$request->title.'%')
	    ->whereHas('company', function ($query) use ($request) {
	        $query->where('status',1)
	        		->whereHas('contacts', function ($query) use ($request) {
			        $query->where('country', 'like', '%'.$request->country.'%');
			    });
	    })
	    ->orderBy('created_at','DESC')
	    ->paginate(20);	

	    $training = Training::where('title','LIKE','%'.$request->title.'%')
	    ->whereHas('company', function ($query) use ($request) {
	        $query->where('status',1)
	        		->whereHas('contacts', function ($query) use ($request) {
			        $query->where('country', 'like', '%'.$request->country.'%');
			    });
	    })
	    ->orderBy('created_at','DESC')
	    ->paginate(20);	  
	    
	    return view('frontend.search')->with([
            'training'=>$training,            
            'job'=>$jobs]);    	    
    }
}
