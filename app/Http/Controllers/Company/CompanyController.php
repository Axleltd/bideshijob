<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Contact;
use App\SocialMedia;
use Auth;
use App\Http\Requests\PostCompanyRequest;
use App\Http\Requests\PutCompanyRequest;
use Illuminate\Support\Facades\Input;

class CompanyController extends Controller
{    
    protected $company;
    protected $socialMedia;
    protected $contact;
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->company = new Company;
        $this->socialMedia = new SocialMedia;
        $this->contact = new Contact;
    }
    public function index()
    {                
        $company = $this->company->orderBy('created_at','DESC')->paginate(5);        
        return view('company.index',compact('company'));
    }

    public function create()
    {
    	return view('company.create');
    }
    public function store(PostCompanyRequest $request)
    {   
        $logo = $this->fileUpload($request);        
        $media = $this->socialMedia->create([
            'facebook' => $request->facebook_link,
            'twitter' => $request->twitter_link
            ]);
        $contact = $this->contact->create([
        'email' => $request->email,
        'address' => $request->address,
        'website_link' => $request->website_link,
        'social_media_id'=>$media->id
        ]);
        $company = $this->company->create([
            'name' => $request->name,
            'description'=>$request->description,
            'logo'=>$logo,
            'user_id' => Auth::user()->id,
            'contact_id' => $contact->id]);        
        if(!$company)
            return redirect('company/create');
        else
            return redirect('company');
    }

    public function show($id)
    {
        $company = $this->company->where('id',$id)->get()->first();
        return view('company.show',compact('company'));
    }

    public function edit($id)
    {
        $company = $this->company->where(['id'=>$id,'user_id'=>Auth::user()->id])->get()->first();                                        
        return view('company.edit',compact('company'));
    }

    public function update(PutCompanyRequest $request,$id)
    {
        $company = $this->company->where('id',$id)->get()->first();                        
        $media = $this->socialMedia->where('id',$company->contact->socialMedia->id)->update([
            'facebook' => $request->facebook_link,
            'twitter' => $request->twitter_link
            ]);        
        $contact = $this->contact->where('id',$company->contact->id)->update([
        'email' => $request->email,
        'address' => $request->address,
        'website_link' => $request->website_link,        
        ]);
        $company = $company->update([
            'name' => $request->name,
            'description'=>$request->description,            
            ]);        
        // if(($company) && ($this->fileUpload($request)))
        //     {
        //        $company = $company->update([
        //             'logo'=>$logo,      
        //             ]); 
        //     }             

        if(!$company)
            return redirect('company/'.$id.'/edit/');
        else
            return redirect('company/'.$id);
        
    }

    public function destroy($id)
    {
        $company = $this->company->where('id',$id);

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
