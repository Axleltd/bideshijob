<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;
class AboutUsController extends Controller
{
	protected $about;
    public function __construct()
    {
    	$this->about = new About;
    }

    public function index()
    {
    	$about = $this->about->first();
    	return view('admin.about.index','about');
    }
}
