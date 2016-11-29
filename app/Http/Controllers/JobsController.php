<?php

namespace App\Http\Controllers;
use Auth;
use App\Job;
use App\Company;
use App\Profile;
use Illuminate\Http\Request;
use App\Notifications\JobFound;
use App\Http\Requests\PostJobRequest;

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
            Auth::user()->notify(new JobFound($this->job->findOrFail($job->id)));
            if($job)
            {
                return redirect('/profile/job');
            }
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
        //
        $job = $this->job->with('company','contact')->where('slug',$id)->first();
         return view('job.show')->with([
            'job' => $job
        ]);
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
            return redirect()->to('/profile/job');
        }
        return redirect()->back()->withInput($request->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($companyId,$id)
    {
        $this->company->findOrFail($companyId);
        $job = $this->job->findOrFail($id);
        if($job->delete())
        {
            return redirect()->back();
        }
        return redirect()->back();
    }
}