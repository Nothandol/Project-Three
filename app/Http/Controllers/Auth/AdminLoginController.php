<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\SessionGaurd;
use App\Http\Controllers\Controller;
use Auth;
use AuthenticatesUsers;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        //for users that are not admin
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function Login(Request $request)
    {
        // Validate form data
        $this->validate($request, [
            'email' => 'required|email', 
            'password' =>'required|min:6'

        ]);

//Attempt to log user in. Function "attempt" handles hashing of passwords

   if (\Auth::gaurd('admin')->attempt(['email' => $request->email, 'password' =>$request->password], $request->$remember)) {
    // Redirect to intended location if successful.   
    return redirect()->intended(route('admin.dashboard'));
   }
// Redirect baack to login if it was not successful but keep the email data
   return redirect()->back()->withInput($request->only('email', 'remember'));
}
}