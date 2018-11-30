<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = auth()->user () -> name;
        $user = User::find($name);
        $user_id = auth()->user ()->id;
        $user = User::find($user_id);
        return view('home')-> with('uploads', $user ->posts);
    }

    public function download($id)
    {
        $post = Upload::findOrFail($id);
        $path = Storage::disk('local')->getDriver()->getAdapter()->applyPathPrefix($post->doc_name);


        // return response()->download($path, $doc->name, ['Content-Type:' . $type]);
        return response()->download($path);
    }

    
}

