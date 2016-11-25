<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use Auth;

class UserController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	$companies = Company::where(['user_id'=>Auth::user()->id])->get(); 
    	return view('admin.user.index',compact('companies'));

    }

}
