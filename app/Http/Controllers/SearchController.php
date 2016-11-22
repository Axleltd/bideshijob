<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Contact;
class SearchController extends Controller
{
    public function companySearch(Request $request)
    {	    	


    	$company = Company::where('status',1)	    
    	->where('name','LIKE','%'.$request->title.'%')
	    ->whereHas('contacts', function ($query) use ($request) {
	        $query->where('address', 'like', '%'.$request->address.'%');
	    })
	    ->orderBy('created_at','DESC')
	    ->paginate(20);

	    if($company)
	    {
	    	return view('company.index',compact('company'));
	    }
    	
    }

    public function trainingSearch(Request $request)
    {

    }
}
