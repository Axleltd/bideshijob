<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use Auth;
use App\Notifications\BusinessNotification;
class CompanyController extends Controller
{
	protected $company;
	public function __construct()
	{
		$this->company = new Company;
	}
	public function index()
	{
		$company = $this->company->all();
		return view('admin.company.index')->with('company',$company);
	}
    public function active($companyId)
    {
    	$company = $this->company->where('id',$companyId)->first();
    	$active = $this->company->where('id',$companyId)->update(['status'=>1]);
    	 
    	if(!$active)
    		return redirect()->back();

    	Auth::user()->notify(new BusinessNotification('Congratulation Your Company '.$company->name.' is approved'));
    	return redirect('/dashboard/company');

    }

    public function suspend($companyId)
    {
		$company = $this->company->where('id',$companyId)->first();
    	$active = $this->company->where('id',$companyId)->update(['status'=>0]);
    	if(!$active)
    		return redirect()->back();
    	Auth::user()->notify(new BusinessNotification('Sorry Your Company '.$company->name.' is Suspended'));
    	return redirect('/dashboard/company');    		
    }

    public function destroy($companyId)
    {
    	$company = $this->company->where('id',$companyId)->first();
    	$destroy = $this->company->destroy('id',$companyId);
    	if(!$destroy)
    		return redirect()->back();
    	Auth::user()->notify(new BusinessNotification('Your Company '.$company->name.' is deleted'));
    	return redirect('dashboard/company');
    }
}
