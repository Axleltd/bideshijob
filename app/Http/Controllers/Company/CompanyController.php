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
<<<<<<< HEAD
    {
        $company = $this->company->orderBy('created_at','DESC')->paginate(5);        
=======
    {                
        $company = $this->company->where('status',1)->orderBy('created_at','DESC')->paginate(5);        
>>>>>>> 3b6b3eb18f01f600b25c8477d22910061618cbb6
        return view('company.index',compact('company'));
    }

    public function create()
    {
    	return view('company.create');
    }
    public function store(PostCompanyRequest $request)
    {   
        $logo = $this->fileUpload($request);        
<<<<<<< HEAD
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
=======
        $company = $this->company->create([
            'user_id'=>Auth::user()->id,
>>>>>>> 3b6b3eb18f01f600b25c8477d22910061618cbb6
            'name' => $request->name,
            'description'=>$request->description,
            'logo' => $logo]);
        if($company)
        {
            $data=[
                'email' => $request->email,
                'address' => $request->address,
                'website_link' => $request->website_link,
                ];
            $contact = $company->contacts()->create($data);            
            if($contact)
            {
                $media = $this->socialMedia->create([
                    'contact_id' => $contact->id,
                    'facebook' => $request->facebook_link,
                    'twitter' => $request->twitter_link]);
                if($media)
                    return redirect('company');
            }
        }
        else
            return redirect()->back()->withInput($request->toArray());
    }

    public function show($id)
    {
        $company = $this->company->where('id',$id)->get()->first();
<<<<<<< HEAD
        return view('company.show',compact('company'));
=======
        if($company)
            return view('company.show',compact('company'));
        else
            return abort('503');
>>>>>>> 3b6b3eb18f01f600b25c8477d22910061618cbb6
    }

    public function edit($id)
    {
<<<<<<< HEAD
        $company = $this->company->where('id',$id)->get()->first();          
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
=======
        $company = $this->company->where(['id'=>$id,'user_id'=>Auth::user()->id])->get()->first();  
        if($company)
            return view('company.edit',compact('company'));
        else
            return abort('503');
    }

    public function update(PutCompanyRequest $request,$id)
    {        
        $company = $this->company->where('id',$id)->update([            
            'name' => $request->name,
            'description'=>$request->description
            ]);                    
        if($company)
        {
            $data=[
                'email' => $request->email,
                'address' => $request->address,
                'website_link' => $request->website_link,
                ];                
            $contact = $this->contact->where('contactable_id',$id)->get()->first();            
            if($contact->update($data))
            {
                $media = $this->socialMedia->where('contact_id',$contact->id)->update([                    
                    'facebook' => $request->facebook_link,
                    'twitter' => $request->twitter_link]);                
                if($media)
                    return redirect('company');
            }
            dd('bhayena');
        }
        else
            return redirect()->back()->withInput($request->toArray());
>>>>>>> 3b6b3eb18f01f600b25c8477d22910061618cbb6
        
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
