<?php

namespace Ocademy\Http\Controllers;

use Auth;
use Ocademy\User;
use Illuminate\Http\Request;
use Ocademy\Http\Requests;

class ProfileController extends Controller
{
    /**
     * Update user details.
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|max:255',
            'username' => 'unique:users,username,'.Auth::user()->id,
            'email'    => 'required|unique:users,email,'.Auth::user()->id,
            'bio'      => 'max:140',
        ]);
        Auth::user()->update($request->all());
        return redirect('dashboard');
    }
}
