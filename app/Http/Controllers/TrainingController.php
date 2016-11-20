<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\PostTrainingRequest;
use App\Http\Requests\PutTrainingRequest;
use App\Training;
use App\Company;

class TrainingController extends Controller
{
    protected $training;  
       
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->training = new Training;              
    }
    public function index($id)
    {
    	$company = Company::where('id',$id)->get()->first();      	      		        
        return view('training.index')->with('training',$company->trainingWithOrder()->paginate(5));
    }

    public function create($id)
    {   $company =Company::where('id',$id)->get()->first();
    	return view('training.create',compact('company'));
    }
    public function store(PostTrainingRequest $request,$id)
    {    	        
    	$company = Company::where('id',$id)->get()->first();    	
        $training = $this->training->create([
            'title' => $request->title,
            'categories'=>$request->categories,
            'fees'=>$request->fees,
            'quantity'=>$request->quantity,
            'company_id' => $id,
            ]);                  
        if(!$training)
            return redirect('company/'.$id.'/training/create');
        else
            return redirect('company/'.$id.'/training');
    }

    public function show($companyId,$trainingId)
    {        
        $training = $this->training->where(['id'=>$trainingId,'company_id'=>$companyId])->get()->first();        
        return view('training.show',compact('training'));
    }

    public function edit($companyId,$trainingId)
    {        
        $training = $this->training->where(['id'=>$trainingId,'company_id'=>$companyId])->get()->first();          
        return view('training.edit',compact('training'));
    }

    public function update(PutTrainingRequest $request,$trainingId,$companyId)
    {                  
        $training = $this->training->where(['id'=>$trainingId,'company_id'=>$companyId])->update([
            	'title' => $request->title,
	            'categories'=>$request->categories,
	            'fees'=>$request->fees,
	            'quantity'=>$request->quantity,
            ]);        

        if(!$training)
            return redirect('company/'.$companyId.'/training/'.$trainingId.'/edit/');
        else
            return redirect('company/'.$companyId.'/training/'.$trainingId);
        
    }

    public function destroy($id)
    {
        $training = $this->training->where('id',$id);

    }
   
}
