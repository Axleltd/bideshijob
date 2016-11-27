<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\PostTrainingRequest;
use App\Http\Requests\PutTrainingRequest;
use App\Training;
use App\Company;
use App\User;
use App\Notifications\NotificationPost;
use Illuminate\Notifications\Notifiable;

class TrainingController extends Controller
{    
    protected $training;
    protected $company;  
       
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->training = new Training;  
        $this->company = new Company;            
    }
    public function index($companyId)
    {           
    	$company = $this->company->where(['id'=>$companyId,'status'=>1])->get()->first();      	      		                
        return view('training.index')->with('training',$company->trainingWithOrder()->paginate(5));
    }

    public function showMyTraining()
    {
        $trainings = $this->training->where('user_id',Auth::user()->id)->get();
        return view('admin.training.viewall',compact('trainings'));
    }

    public function create($companyId)
    {    
        $company = $this->company->where(['id'=>$companyId,'user_id'=>Auth::user()->id])->get()->first();    
        if($company)
    	   return view('training.create',compact('company'));
        return abort('503');
    }
    public function store(PostTrainingRequest $request,$companyId)
    {    
            $company = $this->company->where('id',$companyId)->first();
            $training = $this->training->create([
            'title' => $request->title,
            'categories'=>$request->categories,
            'description'=>$request->training_description,
            'fees'=>$request->fees,
            'from'=>$request->from,
            'to'=>$request->to,
            'quantity'=>$request->quantity,            
            'company_id' => $companyId,
            'country' => $request->country,
            'user_id'=>Auth::user()->id,
            ]);                  
        if(!$training)
            return redirect('company/'.$companyId.'/training/create');

        Auth::user()->notify(new NotificationPost($company->name.' created training '.$training->title,'/company/'.$training->company_id.'/training/'.$training->id));
        return redirect('/profile/training');
    }

    public function show($companyId,$trainingId)
    {
        $training = $this->training->where(['id'=>$trainingId,'company_id'=>$companyId])->get()->first();
        return view('training.show',compact('training'));
    }

    public function edit($companyId,$trainingId)
    {
        $training = $this->training->where(['id'=>$trainingId,'company_id'=>$companyId,'user_id'=>Auth::user()->id])->get()->first();          
        return view('training.edit',compact('training'));
    }

    public function update(PutTrainingRequest $request,$companyId,$trainingId)
    {          
        $training = $this->training->where(['id'=>$trainingId,'company_id'=>$companyId])->update([
            	'title' => $request->title,
	            'categories'=>$request->categories,
                'description'=>$request->training_description,
	            'fees'=>$request->fees,
	            'quantity'=>$request->quantity,
                'from'=>$request->from,
                'to'=>$request->to,
                'country' => $request->country,
            ]);        

        if(!$training)
            return redirect('company/'.$companyId.'/training/'.$trainingId.'/edit/');

        Auth::user()->notify(new NotificationPost($company->name.' updated training '.$training->title,'/company/'.$training->company_id.'/training/'.$training->id));
        return redirect('/profile/training');
        
    }

    public function destroy($id)
    {
        // $training = $this->training->destroy(['id'=>$id,'user_id'=>Auth::user()->id]);

    }
   
}
