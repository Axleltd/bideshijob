<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\PostTrainingRequest;
use App\Http\Requests\PutTrainingRequest;
use App\Training;
use App\Company;
use App\Profile;
use App\User;
use App\Notifications\NotificationPost;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Input;
use App\Notifications\BusinessNotification;
use Session;

class TrainingController extends Controller
{    
    protected $training;
    protected $company;  
    protected $profile;  
       
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->training = new Training;  
        $this->company = new Company;            
        $this->profile = new Profile;            
    }
    public function index($companyId)
    {           
    	$company = $this->company->where(['id'=>$companyId,'status'=>1])->get()->first();      	      		                
        return view('training.index')->with('training',$company->trainingWithOrder()->paginate(5));
    }

    public function showMyTraining()
    {
        $id = Auth::user()->id;
        $profile = $this->profile->where('user_id',$id)->first(); 
        $trainings = $this->training->where('user_id',Auth::user()->id)->get();
        return view('admin.training.viewall')->with(['trainings'=>$trainings,
                        'profile'=>$profile]);
    }

    public function create($companyId)
    {    
        $id = Auth::user()->id;        
        $company = $this->company->where(['slug'=>$companyId,'user_id'=>Auth::user()->id])->get()->first();    
        if($company)
    	   return view('training.create')->with([
                            'company'=>$company]);
        return abort('503');
    }
    public function store(PostTrainingRequest $request,$companyId)
    {    
            $company = $this->company->where('id',$companyId)->first();
            $logo = $this->fileUpload($request,null);        
            $training = $this->training->create([
            'title' => $request->title,
            'categories'=>$request->categories,
            'description'=>$request->training_description,
            'fees'=>$request->fees,
            'from'=>$request->from,
            'to'=>$request->to,
            'quantity'=>$request->quantity, 
            'image'=>$logo,           
            'company_id' => $companyId,
            'country' => $request->country,
            'user_id'=>Auth::user()->id,
            ]);                  
        if(!$training)
        {
            Session::flash('error','Training creating failed');
            return redirect('company/'.$companyId.'/training/create');
        }

        Session::flash('success','Training created');
        Auth::user()->notify(new NotificationPost($company->name.' created training '.$training->title,'training','admin'));
        return redirect('/profile/training');
    }

    public function show($companyId,$trainingId)
    {
        $training = $this->training->where(['slug'=>$trainingId])->get()->first();
        $company = $this->company->where(['slug'=>$companyId,'status'=>1])->first();
        if($company)
            return view('training.show',compact('training'));
        return abort(404);
    }

    public function edit($companyId,$trainingId)
    {        
        $training = $this->training->where(['slug'=>$trainingId,'user_id'=>Auth::user()->id])->get()->first(); 
        if($training)
        {
            return view('training.edit')->with(['training'=>$training]);
        }
        return abort(404);
    }

    public function update(PutTrainingRequest $request,$companyId,$trainingId)
    {  
        
        $training = $this->training->where(['slug'=>$trainingId,'user_id'=>Auth::user()->id])->first();
        $logoName = $training->image;
        
        if($request->image)
            $logoName = $this->fileUpload($request,$logoName);            
        $training_update = $training->update([
            	'title' => $request->title,
	            'categories'=>$request->categories,
                'description'=>$request->training_description,
	            'fees'=>$request->fees,
	            'quantity'=>$request->quantity,
                'image'=>$logoName,
                'from'=>$request->from,
                'to'=>$request->to,
                'country' => $request->country,
            ]);                
        if(!$training_update)
        {
            Session::flash('error','Training updating failed');
            return redirect('company/'.$companyId.'/training/'.$trainingId.'/edit/');
        }
        Session::flash('success','Training updated');
        Auth::user()->notify(new NotificationPost($training->company->name.' updated training '.$training->title,'training','admin'));
        return redirect('/profile/training');
        
    }

    public function destroy($id)
    {

         $training = $this->training->where(['id'=>$id,'user_id'=>Auth::user()->id])->first();         
         if($training){                        
             $destroy = $this->training->destroy('id',$id);
            if(!$destroy)
            {
                Session::flash('error', 'Training deleting failed');
                return redirect()->back();
                
            }
            Session::flash('success', 'Training deleted');        
            $training->user->notify(new BusinessNotification('Your training '.$training->name.' is deleted','training','user'));
            Auth::user()->notify(new NotificationPost($training->company->name.' deleted training '.$training->title,'training','admin'));
            return redirect('profile/training');
        }
        return abort(404);
    }

    public function fileUpload(Request $request,$logoName)
    {
        $files=Input::file('image');        
        $destinationPath = 'image/training'; // upload path
        $fileName = $files->getClientOriginalName();
        $fileExtension = '.'.$files->getClientOriginalExtension();
        if(!$logoName)        
            $logoName = md5($fileName.microtime()).$fileExtension;
        $files->move($destinationPath, $logoName);    

        return $logoName;
        // return $files->store('image');
    }
   
}
