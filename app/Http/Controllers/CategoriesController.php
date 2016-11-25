<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoriesController extends Controller
{
    public function index()
    {
    	return view('category.index')->with(['categories' => Category::all() ]);
    }
    public function show(Category $catgory)
    {
    	return view('category.show')->with(['category' => $category ]);
    }

    public function create()
    {
    	return view('category.create');
    }

    public function edit(Category $category)
    {
    	return view('category.edit',compact('category'));
    }

    public function store(Request $request)
    {
    	if(Category::create($reqeust->toArray))
    	{
    		return redirect()->back();
    	}
    	return redirect()->back()->withInput($request->toArray());
    }
    public function update(Request $request,Category $category)
    {
    	if(Category::create($reqeust->toArray))
    	{
    		return redirect()->back();
    	}
    	return redirect()->back()->withInput($request->toArray());
    }
}
