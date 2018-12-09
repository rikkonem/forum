@extends('layouts.app')

@section('content')
    <section>
        @if($threads->count())
            @foreach($threads as $thread)
                    <div>
                        <h2><a href="{{url('threads/' . $thread->id)}}">{{$thread->title}}</a></h2>
                    </div>
                @endforeach

            {{$threads->links()}}

        @else
            <p>There is no threads, create you own</p>
        @endif
    </section>
@endsection
