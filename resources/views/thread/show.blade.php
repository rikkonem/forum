@extends('layouts.app')

@section('content')
    <article class="card">
        @if(!empty($thread))
           <div class="card-header">
               <strong>{{$thread->title}}</strong>
           </div>

            <div class="card-body">
                <p class="card-text">{{$thread->body}}</p>
                <footer class="card-footer">
                    Author: <a href="{{url('/users/' . $thread->author->id)}}">{{$thread->author->name}}</a>
                    <i class="text-right">Posted: {{ $thread->getCreatedAtFormatted()}}</i>
                </footer>

            @auth
                @if(auth() && (auth()->user()->id == $thread->user_id || auth()->user()->is_admin ))
                    <form method="POST" action="{{url('threads/' . $thread->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-link">Delete Thread</button>
                        <a href="{{url('threads/' . $thread->id . '/edit')}}">Edit</a>
                    </form>
                @endif
            @endauth
            </div>
        @endif
    </article>
    <section class="mt-3">

        @include('post.show')

        <div>
            <p>Be part of a discussion</p>

            @include('post.create')

        </div>
        {{$posts->links()}}
</section>
@endsection
