<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use Auth;

class CompanyController extends Controller
{    
    public function index()
    {

    }

    public function create()
    {
    	return view('admin.company.create');
    }
    public function store(Request $request)
    {
        $company = Company::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            ]);    	
    }
}
