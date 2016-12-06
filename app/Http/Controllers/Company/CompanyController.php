<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Contact;
use App\User;
use App\Profile;
use App\SocialMedia;
use App\Notifications\NotificationPost;
use App\Notifications\BusinessNotification;
use Auth;
use Session;
use App\Http\Requests\PostCompanyRequest;
use App\Http\Requests\PutCompanyRequest;
use Illuminate\Support\Facades\Input;

class CompanyController extends Controller
{    
    protected $company;
    protected $socialMedia;
    protected $contact;    
    protected $profile;    
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->company = new Company;
        $this->socialMedia = new SocialMedia;
        $this->contact = new Contact;
        $this->profile = new Profile;
    }
    public function index()
     {  
          
        $company = $this->company->where('status',1)->orderBy('created_at','DESC')->paginate(5);        
        return view('company.index',compact('company'));
    }

    public function showMyCompany()
    {
        $id = Auth::user()->id;
        $companies = $this->company->where('user_id',$id)->get();
        $profile = $this->profile->where('user_id',$id)->first();
        return view('admin.company.viewall')->with(['companies'=>$companies,
                            'profile' => $profile]);
    }

    public function create()
    {   
        $profile = $this->profile->where('user_id',Auth::user()->id)->first();     
    	return view('company.create',compact('profile'));
    }
    public function store(PostCompanyRequest $request)
    {   
        $status = 0;
        if(\Caffeinated\Shinobi\Facades\Shinobi::isRole('admin'))
            $status = 1;
        $logo = $this->fileUpload($request,null);        
        $company = $this->company->create([
            'user_id'=> Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'status' => $status,
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
            Session::flash('success','Company created');
            Auth::user()->notify(new NotificationPost('company '.$company->name.' is created.','company','admin'));
            return redirect('/profile');
        }
        Session::flash('error','Company creating failed');
        return redirect()->back()->withInput($request->toArray());
    }

    public function show($id)
    {
        $company = $this->company->where(['slug'=>$id,'status'=>1])->get()->first();        
        if($company)
            return view('company.show',compact('company'));
        else
            return abort('503');
    }

    public function edit($id)
    {

        $profile = $this->profile->where('user_id',Auth::user()->id)->first();
        $company = $this->company->where(['slug'=>$id,'user_id'=>Auth::user()->id])->get()->first();  
        

        if($company)
            return view('company.edit')->with([
                        'company'=>$company,
                        'profile'=>$profile]);
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
            Session::flash('success','Company updated');
            Auth::user()->notify(new NotificationPost('Company '.$request->name.' is updated.','company','admin'));
            return redirect('/profile/company');         
        }
        Session::flash('error','Company updating failed');
        return redirect()->back()->withInput($request->toArray());
        
    }

    public function destroy($id)
    {
        $company = $this->company->where(['id'=>$id,'user_id'=>Auth::user()->id])->first();
        if($company){
            $destroy = $this->company->destroy('id',$id);
            if(!$destroy)
            {
                Session::flash('error', 'Company deleting failed');
                return redirect()->back();
                
            }
            Session::flash('success', 'Company deleted');
            Auth::user()->notify(new NotificationPost('company '.$company->name.' is deleted.','company','admin'));
            $company->user->notify(new BusinessNotification('Your Company '.$company->name.' is deleted','company','user'));
            return redirect('profile/company');
        }
        return abort(404);

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
