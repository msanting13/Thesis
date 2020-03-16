<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Hash;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAccountSettingController extends Controller
{
    public function editAccount()
    {
    	return view('admin.settings.account.edit-account');
    }

    public function updateProfile(Request $request)
    {
    	$rules = [
			'name'  => 'required|string|max:255',
			'email' => 'required|string|email|max:255',
		];

		if ($request->hasFile('profile_picture')) {
			$rules['profile_picture'] = 'mimes:jpeg,jpg,png,gif|required|max:10000';
		}

    	$this->validate($request, $rules);

    	$admin = Admin::find(Auth::id());

    	if ($request->hasFile('profile_picture')) {
    		$imageName = $this->uploadProfilePicture($request->file('profile_picture'));
    		$admin->profile_picture = $imageName;
    	}

    	$admin->name = $request->name;
    	$admin->email = $request->email;
    	$admin->save();
    	return back()->with('success','Successfully updated!');
    }

    public function uploadProfilePicture($photo)
    {
    	$time = time();
    	$destination =  public_path() . '/assets/images/users/' . $time .'_' .  str_replace(' ', '_', $photo->getClientOriginalName());
    	$imageName = $time . '_' . $photo->getClientOriginalName();
    	$is_moved = move_uploaded_file($photo, $destination);
    	if ($is_moved) {
    		return $imageName;
    	}
    }

    public function changePassword(Request $request)
    {
        $rules = [
            'password' => 'required|string|min:8|confirmed|different:current_password',
        ];

        $this->validate($request,$rules);

        $admin = Admin::find(Auth::id());

        if (!Hash::check($request->current_password, $admin->password)) 
        {
            return back()->withErrors([
                'current_password' => 'Current Password does not match',
            ]);
        }

        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->back()->with('success','Successfully changed!');
    }
}
