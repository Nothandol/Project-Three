<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
           'doc_name' => 'required|max:1999|mimes:doc,docx,csv,pdf'
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
           
          // $filesize =  $request->file->getClientSize();
            //Get file extension
            $extension = $request ->file('doc_name')->getClientOriginalExtension();
          // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload file to a folder
            $path = $request->file('doc_name')->storeAs('public/upload', $fileNameToStore);
         //File size
            $filesize = Storage::size($path);

    
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
        $post ->doc_name = $fileNameWithExt ;
        $post ->extension = $extension;
        $post ->file_name = $path;
        $post->fileSize = $filesize;

      
        if ($filesize >= 1000000) {
           $post->fileSize = round($filesize/1000000) . 'MB';
         }elseif ($filesize >= 1000) {
           $post->fileSize = round($filesize/1000) . 'KB';
         }else {
           $post->fileSize = $filesize;
         }
       
       
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
        $upload = Upload::find($id);
        return view('pages.edit')->with('upload',$upload);
 
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
        $this -> validate ($request, [
            'title' => 'required',
            'description' =>'required',
           'doc_name' => 'required|max:1999|mimes:doc,docx,csv,pdf'
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
             
              //Get file extension
              $extension = $request ->file('doc_name')->getClientOriginalExtension();
            // filename to store
              $fileNameToStore = $filename.'_'.time().'.'.$extension;
              //Upload file to a folder
              $path = $request->file('doc_name')->storeAs('public/upload', $fileNameToStore);
           //File size
              $filesize = Storage::size($path);
  
      
          }
          else {
              $fileNameToStore= 'no file uploaded';
          }
  
            //Make Upload
          $post = Upload::find($id);;
          $post ->title = $request -> input('title');
          $post ->description = $request ->input('description');
          $post ->user_id = auth() ->user() ->id;
          $post ->author = auth() -> user() -> name;
          $post ->doc_name = $fileNameWithExt ;
          $post ->Created_at = 
          $post ->extension = $extension;
          $post ->file_name = $path;
          $post->fileSize = $filesize;
  
        
          if ($filesize >= 1000000) {
             $post->fileSize = round($filesize/1000000) . 'MB';
           }elseif ($filesize >= 1000) {
             $post->fileSize = round($filesize/1000) . 'KB';
           }else {
             $post->fileSize = $filesize;
           }
         
         
          $post ->save();
          return redirect('/index')->with('success', 'Upload successful');
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
