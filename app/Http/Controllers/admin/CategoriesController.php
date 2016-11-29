<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Auth;
use Session;
use App\Notifications\BusinessNotification;
class CategoriesController extends Controller
{
	protected $category;
	public function __construct()
	{
		$this->category = new Category;
	}

	public function index()
	{
		$category = $this->category->get();
		return view('admin.category.index')->with('categories',$category);
	}
	
}
