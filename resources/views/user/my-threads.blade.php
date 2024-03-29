@extends('layouts.app')

@section('content')
    <section>
        @if($threads->count())
            <h2>Your Threads</h2>
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
            <p>You didn't create any thread yet.</p>
        @endif
    </section>
@endsection
