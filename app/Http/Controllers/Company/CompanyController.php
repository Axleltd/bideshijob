<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Contact;
use App\SocialMedia;
use Auth;
use App\Http\Requests\PostCompanyRequest;

class CompanyController extends Controller
{    
    public function index()
    {

    }

    public function create()
    {
    	return view('admin.company.create');
    }
    public function store(PostCompanyRequest $request)
    {     
        $media = SocialMedia::create([
            'facebook' => $request->facebook_link,
            'twitter' => $request->twitter_link
            ]);
        $contact = Contact::create([
        'email' => $request->email,
        'address' => $request->address,
        'website' => $request->website_link,
        'social_media_id'=>$media->id
        ]);
        $company = Company::create([
            'name' => $request->name,
            'description'=>$request->description,
            'logo'=>'',
            'user_id' => Auth::user()->id,
            'contact_id' => $contact->id]);        
        if(!$company)
            dd('unsucessful');
        else
            dd('successful');
    }
}
