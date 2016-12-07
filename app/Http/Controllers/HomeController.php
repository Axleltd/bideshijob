<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Training;
use App\Job;


class HomeController extends Controller
{
    protected $company;
    protected $training;
    protected $job;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
              $this->company = new Company;
              $this->training = new Training;
              $this->job = new Job;
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {           
        $training = $this->training->with(['company'=> function ($query) {
            $query->where('status',1);
        }])->orderBy('created_at','DESC')->take(3)->get();  

        $job = $this->job->with(['company'=> function ($query) {
            $query->where('status',1);
        }])->where('featured',1)->orderBy('created_at','DESC')->take(3)->get();        
        $company = $this->company->where('status',1)->orderBy('created_at','DESC')->take(5)->get();   
        
        return view('frontend.index')->with([
            'training'=>$training,
            'company'=>$company,
            'job'=>$job]);
    }

    public function training()
    {
        $training = $this->training->with(['company'=> function ($query) {
            $query->where('status',1);
        }])->get();        
        return view('training.index')->with('training',$training);
    }
}
