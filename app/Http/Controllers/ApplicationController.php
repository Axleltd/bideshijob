<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostApplicationRequest;
use App\Application;
use App\Training;
use App\Job;
use Session;
use Illuminate\Support\Facades\Input;

class ApplicationController extends Controller
{
    protected $application;
    protected $class;
    
    public function __construct()
    {
        $this->application = new Application;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostApplicationRequest $request,$id)
    {            
        $file = ''; 
        $this->checkClass($request);
        if($request->apply == 'job')
            $file = $this->fileUpload($request);    
        if($file || $request->apply == 'training')
        {            
                $application =$this->class->findOrfail($id)->application()->create([
                    'full_name'=> $request->full_name,
                    'email' => $request->email,
                    'contact' => $request->contact,            
                    'file' => $file]); 

            if($application)
            {
                Session::flash('success', 'Message sent');
                return redirect()->back();
            }   
        }
         Session::flash('error', 'Message sending failed');                
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function checkClass($request)
    {
        if($request->apply == 'job'){
            return $this->class = new Job;
        } else if ( $request->apply == 'training')
        {
            return $this->class = new Training;
        }
        return die('no');
    }

    public function fileUpload(Request $request)
    {
        $files=Input::file('cv');        
        $destinationPath = 'file'; // upload path
        $fileName = $files->getClientOriginalName();
        $fileExtension = '.'.$files->getClientOriginalExtension();        
        $file = md5($fileName.microtime()).$fileExtension;
        $files->move($destinationPath, $file);    

        return $file;        
    }
}
