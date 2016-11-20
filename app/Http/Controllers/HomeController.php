<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
              
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();
        return view('frontend.index', compact('company'));
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
