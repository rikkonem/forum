<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeEmailRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ChangePasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(ChangeEmailRequest $request)
    {
        $user = Auth::user();

        if (Hash::check(request('current-password'), $user->password)) {
            $user->password =  bcrypt($request->get('new-password'));
            $user->save();

            Session::flash('message', 'Password has been edited.');
        } else {
            Session::flash('error', 'Current password is incorrect');
        }

        return redirect()->back();
    }
}
