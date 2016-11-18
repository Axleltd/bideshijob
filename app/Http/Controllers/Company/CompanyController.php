<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Contact;
use App\SocialMedia;
use Auth;
use App\Http\Requests\PostCompanyRequest;
use Illuminate\Support\Facades\Input;

class CompanyController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

    }

    public function create()
    {
    	return view('admin.company.create');
    }
    public function store(PostCompanyRequest $request)
    {   
        $logo = $this->fileUpload($request);        
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
            'logo'=>$logo,
            'user_id' => Auth::user()->id,
            'contact_id' => $contact->id]);        
        if(!$company)
            dd('unsucessful');
        else
            dd('successful');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $company = Company::where('id',$id)->get()->first();          
        return view('admin.company.edit',compact('company'));
    }

    public function update(Requests $request)
    {
        
    }

    public function fileUpload(PostCompanyRequest $request)
    {
        $files=Input::file('logo');        
        $destinationPath = 'image'; // upload path
        $fileName = $files->getClientOriginalName();
        $fileExtension = '.'.$files->getClientOriginalExtension();
        $newName = md5($fileName.microtime()).$fileExtension;
        $files->move($destinationPath, $newName);    
        return $newName;
    }
}
