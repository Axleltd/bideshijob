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
    public function index()
    {
    	$company = Company::where('id',Auth::user()->id)->get()->first();      	      		        
        return view('training.index')->with('training',$company->trainingWithOrder()->paginate(5));
    }

    public function create()
    {
    	return view('training.create');
    }
    public function store(PostTrainingRequest $request)
    {    	
    	$company = Company::where('id',Auth::user()->id)->get()->first();    	
        $training = $this->training->create([
            'title' => $request->title,
            'categories'=>$request->categories,
            'fees'=>$request->fees,
            'quantity'=>$request->quantity,
            'company_id' => $company->id,
            ]);                  
        if(!$training)
            return redirect('training/create');
        else
            return redirect('training');
    }

    public function show($id)
    {
        $training = $this->training->where('id',$id)->get()->first();
        return view('training.show',compact('training'));
    }

    public function edit($id)
    {
        $training = $this->training->where('id',$id)->get()->first();          
        return view('training.edit',compact('training'));
    }

    public function update(PutTrainingRequest $request,$id)
    {          
        $training = $this->training->where('id',$id)->update([
            	'title' => $request->title,
	            'categories'=>$request->categories,
	            'fees'=>$request->fees,
	            'quantity'=>$request->quantity,
            ]);        

        if(!$training)
            return redirect('training/'.$id.'/edit/');
        else
            return redirect('training/'.$id);
        
    }

    public function destroy($id)
    {
        $training = $this->training->where('id',$id);

    }
   
}
