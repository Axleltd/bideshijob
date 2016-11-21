<?php

namespace App\Http\Controllers\Jobs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function create($slug)
    {
    	#create Contact view
    }

    public function store($slug)
    {
    	$job = Job::contact()->create([
    		## Insert contact data-here
    		]);
    	if($job)
    	{
    		#notification info left
    		return redirect()->to('#locationhere-if-created');
    	}
		#notification info left
    	return redirect()->to('#locationhere-if-not-created');
    }

    public function edit($slug,$id)
    {
    	
    	$job = Job::findOrFail($slug)->with(['contact'=>function($query) use($id){
    		return $query->findOrFail($id);
    	}]);
    	#view for editing of contact pass job
    }

    public function update($slug,$id)
    {
    	$job = Job::findOrFail($slug)->contact()->update([
    			#database info 
    		]);
    	if($job)
    	{
    		#notification info left
    		return redirect()->to('#locationhere-if-created');
    	}
		#notification info left
    	return redirect()->to('#locationhere-if-not-created');
    }
    
}
