<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostApplicationRequest;
use App\Application;

class ApplicationController extends Controller
{
    protected $application;
    
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
    public function store(PostApplicationRequest $request)
    {
        $file = $this->fileUpload($request);    
        $application = $this->application->create([
            'full_name'=> $request->full_name,
            'email' => $request->email,
            'contact' => $request->contact,            
            'file' => $file]); 
        if($application)
        {
            return redirect('/');
        }   
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
