<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;
use App\User; 
use DB;

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
           // 'doc_name' => 'mimes:doc, docx, csv, pdf|max:1999'
        ]);

        
        // get the data of uploaded user
        $author = auth()->user()->name;
        $user = User::find($author);

        // Handle file upload
        if($request->hasFile('doc_name')){
            
             // filename with extension
            $fileNameWithExt = $request->file('doc_name')->getClientOriginalName();
            // filename only
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //File size
           // $filesize =  $request->file->getClientSize();
            //Get file extension
            $extension = $request ->file('doc_name')->getClientOriginalExtension();
          // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload file
            $path = $request->file('doc_name')->storeAs('public/upload', $fileNameToStore);

           // $file = new Upload;
            //$file -> title = $filename;
           // $file -> fileSize = $filesize;
           // $file -> extension = $extension;
            //$file->save();
            //return 'uploaded';
        }
        else {
            $fileNameToStore= 'no file uploaded';
        }

        //Make Upload
        $post = new Upload;
        $post ->title = $request -> input('title');
        $post ->description = $request ->input('description');
        $post ->user_id = auth() ->user() ->id;
        $post ->author = auth() -> user() -> name;
        $post ->doc_name = $fileNameToStore;
       // $post->filesize = $filesize;
        $post ->save();
        return redirect('/home')->with('success', 'Upload successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       $post = Upload::find($id);
       return view('pages.show')->with('post',$post);
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

    public function getUploads(){
        return view('pages.create');
    }

    
}
