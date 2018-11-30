<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DownloadsController extends Controller
{
    public function download(){
       $downloads=DB::table('uploads')->get();
       //return view('home', compact('downloads'));
    }
}
