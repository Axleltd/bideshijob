<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Training;


class HomeController extends Controller
{
    protected $company;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
              $this->company = new Company;
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
        $training = Training::all();
        return view('training.index',compact('training'));
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
