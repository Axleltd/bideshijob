<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\DatabaseNotification;
use App\Application;
use App\Message;

class NotificationViewController extends Controller
{
    public function allNotification()
    {
    	$notifications = DatabaseNotification::where('data','LIKE','%admin%')->orderBy('created_at','DESC')->paginate(10);   
                    
    	return view('admin.notification.allNotification',compact('notifications'));
    }

    public function messages()
    {
    	$messages = Message::orderBy('created_at','DESC')->paginate(10);
    	return view('admin.notification.message',compact('messages'));	
    }

    public function userSubscription()
    {
    	$applications = Application::orderBy('created_at','DESC')->paginate(10);
    	return view('admin.notification.user_subscription',compact('applications'));	
    }
}
