@extends('layouts.app')

@section('content')
    <section>
        @if($threads->count())
            <h2>Threads with
                @foreach($selectedTags as $selected)
                    <span class="badge badge-primary">{{$selected}}</span>
                @endforeach
                tag(s)</h2>
            @foreach($threads as $thread)
                <div>
                    <h2><a href="{{url('threads/' . $thread->id)}}">{{$thread->title}}</a></h2>
                    @foreach($thread->tags as $tag)
                        <span class="badge badge-primary">{{$tag->slug}}</span>
                    @endforeach
                </div>
            @endforeach
            {{$threads->links()}}
        @else
            <p>There is no threads with

                @foreach($selectedTags as $selected)
                    <span class="badge badge-primary">{{$selected}}</span>
                @endforeach
                tag.</p>
        @endif
        <hr>
        @include('thread.tags')

    </section>
@endsection
