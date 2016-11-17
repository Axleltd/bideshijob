<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    	dd($request->name);
    }
}
