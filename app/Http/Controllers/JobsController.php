<?php

namespace App\Http\Controllers;
use Auth;
use App\Job;
use App\Company;
use App\Profile;
use Session;
use Illuminate\Http\Request;
use App\Notifications\JobFound;
use App\Http\Requests\PostJobRequest;
use App\Notifications\NotificationPost;
use App\Notifications\BusinessNotification;

class JobsController extends Controller
{
    protected $job;
    protected $company;  
    protected $profile;  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->job = new Job;  
        $this->company = new Company;            
        $this->profile = new Profile;            
    }

    public function index($companyId)
    {
        
        $company = $this->company->where(['slug'=>$companyId,'status'=>1])->first();
        if(!$company)
        {
            abort(404);
        }        
        $job = $this->job->where('company_id',$company->id)->paginate(10);
        return view('job.index',compact('company'))->with([
            'jobs' => $job
            ]);        

    }

    public function showMyJob()
    {   
        $id = Auth::user()->id;
        $profile = $this->profile->where('user_id',$id)->first(); 
         $jobs = $this->job->where('user_id',Auth::user()->id)->get();
        return view('admin.job.viewall')->with(['jobs'=>$jobs,
                        'profile'=>$profile]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($companyId)
    {      
        $company = $this->company->where(['slug'=>$companyId,'user_id'=>Auth::user()->id])->first();    
        if(!$company)
        {
            abort(404);
        }

        if($company)
           return view('job.create')->with(['id'=>$company->id,
                        'company'=>$company,
                        ]);
        return abort('503');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostJobRequest $request, $companyId)
    {
        //
         $job = $this->company->with('job')->findOrFail($companyId)->job()
         ->create([
            'title' => $request->title,
            'description' => $request->description,
            'company_id' => $companyId,
            'user_id' => Auth::user()->id,
            'categories' => $request->categories,
            'about_job' => $request->about_job,
            'facilities' => $request->facilities,
            'duties'  => $request->duties,
            'salary'  => $request->salary,
            'cost' => $request->cost,
            'overtime'  => $request->overtime,
            'quantity' => $request->quantity,
            'duty_hours' => $request->duty_hours,            
            'requirement' => $request->requirement,
            'country' => $request->country,
            ]);
            
            if($job)
            {
                Auth::user()->notify(new NotificationPost($job->company->name.' created job '.$job->title,'job','admin'));
                Session::flash('success','Job created');
                return redirect('/profile/job');
            }
            Session::flash('error','Job creating failed');
            return redirect()->back()->withInput($request->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($companyId,$id)
    {
        $job = $this->job->where('slug',$id)               
        ->whereHas('company', function ($query) use ($companyId) {
            $query->where(['status'=>1,'slug'=>$companyId]);
        })        
        ->first();
        if($job)
            return view('job.show')->with([
                'job' => $job]);
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($companyId,$id)
    {
         $company = $this->company->where('slug',$companyId)->first();
        if(!$company || $company->user_id !== Auth::user()->id)
        {
            abort(404);
        }
         $job = $this->job->where(['slug'=>$id])->get()->first();  
         return view('job.edit')->with([
            'job' => $job
                 
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostJobRequest $request,$companyId, $id)
    {
        $this->company->findOrFail($companyId);
        $job= $this->job->findOrFail($id);
        $update = $job->update([            
             'title' => $request->title,
            'description' => $request->description,
            'company_id' => $companyId,
            'user_id' => Auth::user()->id,
            'categories' => $request->categories,
            'about_job' => $request->about_job,
            'facilities' => $request->facilities,
            'duties'  => $request->duties,
            'salary'  => $request->salary,
            'cost' => $request->cost,
            'overtime'  => $request->overtime,
            'quantity' => $request->quantity,
            'duty_hours' => $request->duty_hours,            
            'requirement' => $request->requirement,
            'country' => $request->country,
            
            ]); 
        if($update)
        {
            Auth::user()->notify(new NotificationPost($job->company->name.' updated job '.$job->title,'job','admin'));
            Session::flash('success','Job updated');
            return redirect()->to('/profile/job');
        }
        Session::flash('error','Job updating failed');
        return redirect()->back()->withInput($request->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = $this->job->where(['id'=>$id,'user_id'=>Auth::user()->id])->first();         
         if($job){                        
             $destroy = $this->job->destroy('id',$id);
            if(!$destroy)
            {
                Session::flash('error', 'Job deleting failed');
                return redirect()->back();
                
            }
            Session::flash('success', 'Job deleted');        
            $job->user->notify(new BusinessNotification('Your job '.$job->name.' is deleted','job','user'));
            Auth::user()->notify(new NotificationPost($job->company->name.' deleted job '.$job->title,'job','admin'));
            return redirect('profile/job');
        }
        return abort(404);
    }
}