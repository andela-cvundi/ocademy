<?php

namespace Ocademy\Http\Controllers;

use Auth;
use Cloudder;
use Ocademy\User;
use Ocademy\Tutorial;
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
        return view('dashboard.settings', compact('user'));
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
            'avatar' => 'required|max:10240',
        ]);
        $img = $request->file('avatar');
        Cloudder::upload($img);
        User::find(Auth::user()->id)->updateAvatar(Cloudder::getResult()['url']);
        return redirect()->back()->with('status', 'Avatar updated successfully.');
    }

    /**
     * Display all tutorials from user
     */
    public function myTutorials()
    {
        $tutorials = Tutorial::where('user_id', Auth::user()->id)->paginate(12);
        return view('dashboard.tutorials', compact('tutorials'));
    }
}
