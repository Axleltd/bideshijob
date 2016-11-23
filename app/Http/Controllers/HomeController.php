<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Training;


class HomeController extends Controller
{
    protected $company;
    protected $training;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
              $this->company = new Company;
              $this->training = new Training;
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $training = Training::orderBy('created_at','DESC')->get();
           
        return view('frontend.index')->with([
            'training'=>$training]);
    }

    public function training()
    {
        $training = $this->training->with(['company'=> function ($query) {
            $query->where('status',1);
        }])->get();        
        return view('training.index')->with('training',$training);
    }

    public function aboutUs()
    {
        return view('frontend.about_us');
    }

    public function contactUs()
    {
        return view('frontend.contact_us');
    }
}
