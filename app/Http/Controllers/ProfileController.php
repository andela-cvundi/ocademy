<?php

namespace Ocademy\Http\Controllers;

use Auth;
use Ocademy\User;
use Cloudder;
use Illuminate\Http\Request;
use Ocademy\Http\Requests;

class ProfileController extends Controller
{
    /**
     * Edit user profile
     * @return view
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.settings', compact('user'));
    }
    /**
     * Update user details.
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|max:255',
            'username' => 'unique:users,username,'.Auth::user()->id,
            'email'    => 'required|unique:users,email,'.Auth::user()->id,
            'info'      => 'max:200',
        ]);
        Auth::user()->update($request->all());

        return redirect()->back()->with('status', 'Profile info updated successfully.');
    }

    /**
     * Update user avatar.
     */
    public function updatePic(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required',
        ]);
        $img = $request->file('avatar');
        Cloudder::upload($img);
        User::find(Auth::user()->id)->updateAvatar(Cloudder::getResult()['url']);
        return redirect()->back()->with('status', 'Avatar updated successfully.');
    }
}
