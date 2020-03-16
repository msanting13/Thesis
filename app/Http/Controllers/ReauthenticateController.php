<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;

class ReauthenticateController extends Controller
{
    public function reauthenticate()
    {
    	return view('auth.password.confirm');
    }
    public function processReauthenticate(Request $request)
    {
    	//good password
        if (Hash::check($request->password, Auth::user()->password)) {
        	//update session
        	$request->session()->put('reauthenticate.last_authentication', strtotime('now'));

        	//send to requested page
        	return redirect()->to($request->session()->get('reauthenticate.requested_url','/'));
        }
        //send back
        return back();
    }
}
