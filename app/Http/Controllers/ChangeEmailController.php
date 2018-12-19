<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeEmailRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ChangeEmailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(ChangeEmailRequest $request)
    {
        $user = Auth::user();

        if (Hash::check(request('password'), $user->password)) {
            $user->email = $request->get('new-email');
            $user->save();

            Session::flash('message', 'Email has been edited.');
        } else {
            Session::flash('message', 'Password is incorrect');
        }

        return redirect()->back();
    }
}
