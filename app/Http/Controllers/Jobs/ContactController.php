<?php

namespace App\Http\Controllers\Jobs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;

class ContactController extends Controller
{

    public function create($slug)
    {
        $job = Job::with('contact')->findOrFail($slug);
        if($job->contact !==null && $job->contact->count() > 0)
        {
            return redirect('jobs/'.$slug.'/contact/'.$job->contact->id.'/edit'); 
        }
        return view('contact.create',compact('slug'));
    }


    public function index($slug)
    {
    	$job = Job::with(['contact'=>function($query){
            return $query->with('socialMedia');

        }])->findOrFail($slug);

        return view('contact.index',compact('job','slug','id'));
        #####VIEW MA JANEY#############
        if($job->contact !==null && $job->contact->count() > 0)
        {
            echo "Address: ". $job->contact->address.'<br>';
            echo "Website: ". $job->contact->website_link.'<br>';
            echo "Email: ". $job->contact->email.'<br>';
            if($job->contact->socialMedia !==null && $job->contact->socialMedia->count() > 0)
            {    
                echo "Facebook: ". $job->contact->socialMedia->facebook.'<br>';
                echo "Twitter: ". $job->contact->socialMedia->twitter.'<br>';
            }
            echo "<a href='".url('job/'.$job->id.'/contact/'.$job->contact->id.'/edit')."'> Click Here to Edit".'</a>';
        }else{

        echo "No result found create a new one";
        echo "<a href='".url('job/'.$job->id.'/contact/create')."'> Click Here to Create".'</a>';
        }
        #####VIEW MA JANEY#############
    }

    public function store(Request $request, $slug)
    {
        #Creating the contact for the job[This sets away the hassle]
    	$job = Job::findOrFail($slug)->contact()->create([
    		## Insert contact data-here
                'email' => $request->email,
                'address' => $request->address,
                'website_link' => $request->website_link,
    		]);
        //Adding Social Media Links
        $contact = Job::with(['contact'=>function($query) use ($slug){
                    return $query->with('socialMedia');
                    }])
                ->findOrFail($slug) #find Job
                ->contact #get job's contact
                ->socialMedia() # get contact's Social Media
                ->create([ # Create the social media
                    'facebook'=> $request->facebook_link,
                    'twitter'=> $request->twitter_link,
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
        # Get Job with contact and check if the contact is present
        # else fail 
        $job = Job::with([
            'contact'=>function($query) use ($id){
                return $query->findOrFail($id);
            }])->findOrFail($slug);

        return view('contact.edit',compact('job','slug','id'));
    }
    public function show($slug,$id)
    {
    	
    	$job = Job::with(['contact'=>function($query) use ($id){
            return $query->findOrFail($id);
        }])->findOrFail($slug);
    	return view('contact.edit',compact('job','slug','id'));
    }

    public function update(Request $request,$slug,$id)
    {
        ##Updating the contact
    	$job = Job::findOrFail($slug)->contact()->update([
    			'email' => $request->email,
                'address' => $request->address,
                'website_link' => $request->website_link,
    		]);
        ##FEtching the contact 
        $contact = Job::with(['contact'=>function($query) use ($id){
            return $query->with('socialMedia');
            }])->findOrFail($slug)
                ->contact;
        #Checking if the contact has Social Media if not create or update if it has
            if($contact->socialMedia == null ||$contact->socialMedia->count() < 1 )
            {
                $contact->socialMedia()->create([
                    'facebook'=> $request->facebook_link,
                    'twitter'=> $request->twitter_link,
                    ]);
            }else{

                $contact->socialMedia()->update([
                    'facebook'=> $request->facebook_link,
                    'twitter'=> $request->twitter_link,
                    ]);
            }

        #if the job's contact is actually created redirect             
    	if($job)
    	{
    		#notification info left
    		return redirect()->to('job/'.$slug);
    	}
        #redirect to the form if if contact is not created 
		#notification info left
    	return redirect()->back()->withInput($request->toArray());
    }
}
    
