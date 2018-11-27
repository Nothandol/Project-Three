<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;

class UploadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uploads = Upload::all();
        return view('uploads.index')->with('uploads', $uploads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate ($request, [
            'title' => 'required',
            'description' =>'required',
            'file' => 'mimes:doc, docx, csv, pdf'
        ]);

        // Handle file upload
        if($request->hasFile('file')){
            $filename =  $request->file->getClientOriginalName();
            $filesize =  $request->file->getClientSize();
            //Get file extension
            $extension = $request ->file('file')->getOriginalClientExtension();
            //Upload file
            $request ->file->storeAs('public/upload',$filename);

            $file = new Upload;
            $file -> title = $filename;
            $file -> description = 
            $file -> fileSize = $filesize;
            $file->save();
            //return 'uploaded';
        }
        else {
            $filename = 'no file uploaded';
        }

        //Make Upload
        $post = new Upload;
        $post ->title = $request -> input('title');
        $post ->body = $request ->input('description');
        $post ->user_id - auth() ->user() ->id;
        $post->file = $filename;
        $post ->save();
        
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

    public function getView(){
        return view('pages.create');
    }
}
