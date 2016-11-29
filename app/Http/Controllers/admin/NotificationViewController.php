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
    	$notifications = DatabaseNotification::orderBy('created_at','DESC')->get();            
    	return view('admin.notification.allNotification',compact('notification'));
    }

    public function messages()
    {
    	$message = Message::all();
    	return view('admin.notification.message',compact('message'));	
    }

    public function userSubscription()
    {
    	$application = Application::all();
    	return view('admin.notification.user_subscription');	
    }
}
