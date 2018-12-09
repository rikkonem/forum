<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ChangePasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function confirmPassword(Request $request)
    {
         return  $this->validate($request, [
             'new-password' => 'required|min:6',
             'confirmed-password' => 'required|min:6|same:new-password',
             'current-password' => 'required'
        ]);
    }

    public function update(Request $request)
    {

        $this->confirmPassword($request);

        $user = Auth::user();

        if (Hash::check(request('current-password'), $user->password))
        {
            $user->password =  bcrypt($request->get('new-password'));
            $user->save();

            Session::flash('message', 'Password has been edited.');


        } else {
            Session::flash('error', 'Current password is incorrect');
        }

        return redirect()->back();
    }

}
