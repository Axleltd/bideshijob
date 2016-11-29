<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use Auth;
use Session;
use App\Notifications\BusinessNotification;
class SubscriptionsController extends Controller
{
	protected $category;
	public function __construct()
	{
		$this->category = new Category;
	}

	public function index()
	{
		$category = $this->category->get();
		return view('admin.post.index')->with('category',$category);
	}
	
}
