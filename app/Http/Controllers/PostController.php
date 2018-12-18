<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $validated = $request->only('body');
        $validated['thread_id'] = request('thread');
        $validated['user_id'] = auth()->id();

        Post::create($validated);

        Session::flash('message', 'Post has been created.');

        return back();
    }


    public function edit(Post $post)
    {
        return view('post.edit', [
            'post' => $post
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $validated = $request->all();

        $post->update($validated);

        Session::flash('message', 'Post has been edited.');

        return redirect('/threads/' . $post->thread_id);
    }


    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Post $post)
    {

        $this->authorize('delete', $post);

        $post->delete();

        Session::flash('message', 'Post has been deleted.');

        return back();
    }
}
