<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use Auth;
use App\User;
class UserController extends Controller
{
	protected $user;

	public function __construct()
	{	
		$this->user = new User;
	}

    public function index()
    {    	
    	$users = $this->user->all();
    	
    	return view('admin.user.index',compact('users'));

    }

}
