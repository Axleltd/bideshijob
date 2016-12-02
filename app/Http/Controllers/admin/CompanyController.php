<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use Auth;
use Session;
use App\Notifications\BusinessNotification;
use App\Notifications\NotificationPost;
class CompanyController extends Controller
{
	protected $company;
	public function __construct()
	{
		$this->company = new Company;
	}
	public function index()
	{
		$company = $this->company->orderBy('created_at','DESC')->get();
		return view('admin.company.index')->with('company',$company);
	}
   
    public function active($companyId)
    {
    	$company = $this->company->where('id',$companyId)->first();
    	$active = $this->company->where('id',$companyId)->update(['status'=>1]);
    	 
    	if(!$active)
    	{
    		Session::flash('error', 'Company activating failed');
    		return redirect()->back();
    	}
    	Session::flash('success', 'Company activated');
    	$company->user->notify(new BusinessNotification('Congratulation Your Company '.$company->name.' is approved','company','user'));
    	return redirect('/dashboard/company');

    }

    public function suspend($companyId)
    {
		$company = $this->company->where('id',$companyId)->first();
    	$active = $this->company->where('id',$companyId)->update(['status'=>0]);
    	if(!$active)
    	{
    		Session::flash('error', 'Company suspending failed');
    		return redirect()->back();
    		
    	}
    	Session::flash('success', 'Company suspended');
    	$company->user->notify(new BusinessNotification('Sorry Your Company '.$company->name.' is Suspended','company','user'));
    	return redirect('/dashboard/company');    		
    }

    public function destroy($companyId)
    {
    	$company = $this->company->where('id',$companyId)->first();
    	$destroy = $this->company->destroy('id',$companyId);
    	if(!$destroy)
    	{
    		Session::flash('error', 'Company deleting failed');
    		return redirect()->back();
    		
    	}
    	Session::flash('success', 'Company deleted');
        Auth::user()->notify(new NotificationPost('company '.$company->name.' is deleted.','company','admin'));
    	$company->user->notify(new BusinessNotification('Your Company '.$company->name.' is deleted','company','user'));
    	return redirect('dashboard/company');
    }
}
