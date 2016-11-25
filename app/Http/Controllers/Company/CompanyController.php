<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Contact;
use App\User;
use App\SocialMedia;
use App\Notifications\NotificationPost;
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
          
        $company = $this->company->where('status',1)->orderBy('created_at','DESC')->paginate(5);        
        return view('company.index',compact('company'));
    }

    public function showMyCompany()
    {
        $companies = $this->company->where('user_id',Auth::user()->id)->get();
        return view('admin.company.viewall',compact('companies'));
    }

    public function create()
    {
    	return view('company.create');
    }
    public function store(PostCompanyRequest $request)
    {   
        $logo = $this->fileUpload($request,null);        
        $company = $this->company->create([
            'user_id'=>Auth::user()->id,
            'name' => $request->name,
            'description'=>$request->description,
            'logo' => $logo]);
        if($company)
        {
     
            $contact = $company->contacts()->create([
                    'email' => $request->email,
                    'address' => $request->address,
                    'country' => $request->country,
                    'latitude'=>$request->latitude,
                    'longitude'=>$request->longitude,
                    'website_link' => $request->website_link
                    ]);            
            if($contact)
            {
                $media = $this->socialMedia->create([
                    'contact_id' => $contact->id,
                    'facebook' => $request->facebook_link,
                    'twitter' => $request->twitter_link]);                
             
            }
            Auth::user()->notify(new NotificationPost('company '.$company->name.' is created.'));
            return redirect('company');
        }
        else
            return redirect()->back()->withInput($request->toArray());
    }

    public function show($id)
    {
        $company = $this->company->where('id',$id)->get()->first();
        if($company)
            return view('company.show',compact('company'));
        else
            return abort('503');
    }

    public function edit($id)
    {
        $company = $this->company->where(['id'=>$id,'user_id'=>Auth::user()->id])->get()->first();  
        if($company)
            return view('company.edit',compact('company'));
        else
            return abort('503');
    }

    public function update(PutCompanyRequest $request,$id)
    {
        $company = $this->company->where('id',$id)->first();
        $logoName = $company->logo;
        
        if($request->logo)
            $logoName = $this->fileUpload($request,$logoName);            
                
        $company = $company->update([            
            'name' => $request->name,
            'description'=>$request->description,
            'logo' => $logoName
            ]);                                            
        
        if($company)
        {
            $data=[
                'email' => $request->email,
                'address' => $request->address,
                'country' => $request->country,
                'website_link' => $request->website_link,
                'latitude'=>$request->latitude,
                'longitude'=>$request->longitude,
                ];                
            $contact = $this->contact->where('contactable_id',$id)->get()->first();            
            if($contact->update($data))
            {
                $media = $this->socialMedia->where('contact_id',$contact->id)->update([                    
                    'facebook' => $request->facebook_link,
                    'twitter' => $request->twitter_link]);                                
            }
            Auth::user()->notify(new NotificationPost('Company '.$request->name.' is updated.'));
            return redirect('company/'.$id);            
        }
        else
            return redirect()->back()->withInput($request->toArray());
        
    }

    public function destroy($id)
    {
        $company = $this->company->where('id',$id);

    }

    public function fileUpload(Request $request,$logoName)
    {
        $files=Input::file('logo');        
        $destinationPath = 'image'; // upload path
        $fileName = $files->getClientOriginalName();
        $fileExtension = '.'.$files->getClientOriginalExtension();
        if(!$logoName)        
            $logoName = md5($fileName.microtime()).$fileExtension;
        $files->move($destinationPath, $logoName);    

        return $logoName;
        // return $files->store('image');
    }
}
