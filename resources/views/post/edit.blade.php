@extends('layouts.app')

@section('content')

    <section>
        <h2>Your are editing:</h2>
                <div class="card mb-3">
                    <div class="card-body">
                        <p>{{$post->body}}</p>
                        <footer class="card-footer">
                            Author: <a href="{{url('/users/' . $post->author->id)}}">{{$post->author->name}}</a>
                            <i class="text-right">Posted: {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</i>
                        </footer>
                    </div>
                </div>

        <div>
            <p>Edit your post</p>
            @auth
                <form method="post" action="{{url('/posts/' . $post->id)}}">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <textarea name="body" class="form-control">{{$post->body}}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            @endauth

    </section>
@endsection
