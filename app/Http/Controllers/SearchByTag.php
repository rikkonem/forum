<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Http\Requests\TagRequest;

class SearchByTag extends Controller
{

    public function show(TagRequest $request)
    {

        $selectedTags = $request->only('tags');

        $threads = Thread::withAnyTag($selectedTags)->paginate(10);

        $tags = Thread::existingTags()->sortByDesc('count');

        return view('thread/withTags')->with([
            'threads' => $threads,
            'selectedTags' => $selectedTags["tags"],
            'tags' => $tags
        ]);

    }

}
