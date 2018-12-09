<?php

namespace App\Http\Controllers;

use App\Thread;

class UserThreadController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $threads = Thread::where('user_id', auth()->user()->id)->paginate(10);

        return view('user.my-threads', [
            'threads' =>  $threads
        ]);
    }

}
