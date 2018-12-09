<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilePictureRequest;
use Illuminate\Support\Facades\Auth;



class ProfilePictureController extends Controller
{

    public function update(ProfilePictureRequest $request)
    {

        $user = Auth::user();

        $name = "profile_picture_" . $user->id . "." . $request->file('profile_picture')->getClientOriginalExtension();

        $request->profile_picture->storeAs('profile-pictures',$name);

        $user->profile_picture = $name;
        $user->save();

        return back()->with('message', 'You have successfully updated your profile photo.');

    }
}
