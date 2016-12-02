<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Training;
use Session;
use Auth;
use App\Notifications\BusinessNotification;
use App\Notifications\NotificationPost;

class TrainingController extends Controller
{
    protected $training;
	public function __construct()
	{
		$this->training = new Training;
	}
	public function index()
	{
		$trainings = $this->training->orderBy('created_at','DESC')->get();
		return view('admin.training.index')->with('trainings',$trainings);
	}
    public function featured($trainingId)
    {
    	$training = $this->training->where('id',$trainingId)->first();
    	$featured = $this->training->where('id',$trainingId)->update(['featured'=>1]);
    	 
    	if(!$featured)
    	{
    		Session::flash('error', 'Training featuring failed');
    		return redirect()->back();
    	}
    	Session::flash('success', 'Training featured');
    	$training->user->notify(new BusinessNotification('Congratulation Your training '.$training->name.' is featured','training','user'));
    	return redirect('/dashboard/training');

    }

    public function unFeatured($trainingId)
    {
		$training = $this->training->where('id',$trainingId)->first();
    	$active = $this->training->where('id',$trainingId)->update(['featured'=>0]);
    	if(!$active)
    	{
    		Session::flash('error', 'Training unfeaturing failed');
    		return redirect()->back();
    		
    	}
    	Session::flash('success', 'Training unfeatured');
    	$training->user->notify(new BusinessNotification('Sorry Your training '.$training->name.' is not featured','training','user'));
    	return redirect('/dashboard/training');    		
    }
    

    public function destroy($trainingId)
    {        
    	$training = $this->training->where('id',$trainingId)->first();
    	$destroy = $this->training->destroy('id',$trainingId);
    	if(!$destroy)
    	{
    		Session::flash('error', 'Training deleting failed');
    		return redirect()->back();
    		
    	}
    	Session::flash('success', 'Training deleted');        
    	$training->user->notify(new BusinessNotification('Your training '.$training->name.' is deleted','training','user'));
    	return redirect('dashboard/training');
    }
}
