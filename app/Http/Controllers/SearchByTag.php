<?php

namespace App\Http\Controllers;

use App\Thread;

class SearchByTag extends Controller
{

    public function show($tag)
    {

        $threads = Thread::withAnyTag($tag)->paginate(10);

        $tags = Thread::existingTags()->sortByDesc('count');


        return view('thread/withTags')->with([
            'threads' => $threads,
            'tag' => $tag,
            'tags' => $tags
        ]);

    }

}
