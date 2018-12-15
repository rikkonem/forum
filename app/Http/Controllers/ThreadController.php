<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThreadRequest;
use App\Thread;
use Illuminate\Support\Facades\Session;

class ThreadController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth')->except('index', 'show');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::with('tagged')->paginate(10);

        return view('thread.index', [
            'threads' => $threads
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thread.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param ThreadRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThreadRequest $request)
    {
        $valid_data = $request->only('title', 'body');

        $valid_data['user_id'] = auth()->id();

        $tags = explode(",", str_replace(' ', '',$request->get('tags')));

        $thread = Thread::create($valid_data);

        empty($tags[0]) ? null : $thread->tag($tags);

        Session::flash('message', 'Thread has been created.');

        return redirect('/threads/' . $thread->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {

        $posts = $thread->posts()->paginate(5);

        return view('thread.show', [
            'thread' => $thread,
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {

        return view('thread.edit', [
            'thread' => $thread
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ThreadRequest $request
     * @param  \App\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function update(ThreadRequest $request, Thread $thread)
    {
        $validated = $request->only('title', 'body');

        $thread->update($validated);

        $tags = explode(",", str_replace(' ', '',$request->get('tags')));

        empty($tags[0]) ? $thread->untag() : $thread->retag($tags);

        Session::flash('message', 'Thread has been edited.');

        return redirect('/threads/' . $thread->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Thread $thread
     * @return \Illuminate\Http\Response
     * @throws \Exception
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Thread $thread)
    {

        $this->authorize('delete', $thread);

        $thread->delete();

        Session::flash('message', 'Thread has been deleted.');

        return redirect('/');
    }
}
