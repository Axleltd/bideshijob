<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Training;
use App\User;

class DashBoardController extends Controller
{
	protected $company;
	protected $training;

	public function __construct()
	{
		$this->company = new Company;
		$this->training = new Training;
	}

    public function index()
    {
    	$company_count = $this->company->all()->count();
    	$company_status = $this->company->where('status',1)->count();

    	$training_count = $this->training->all()->count();
    	$training_status = $this->training->where('featured',1)->count();

    	
    	return view('admin.index')->with([
    		'company'=>$company_count,
    		'training'=>$training_count]);
    }
}
