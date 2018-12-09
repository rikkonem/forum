@if($posts->count())

    @foreach($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <p>{{$post->body}}</p>
                <footer class="card-footer">
                    Author: <a href="{{url('/users/' . $post->author->id)}}">{{$post->author->name}}</a>
                    <i class="text-right">Posted: {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</i>
                </footer>
                @auth
                    @if(auth() && (auth()->user()->id == $post->user_id || auth()->user()->is_admin))
                        <form method="post" action="{{url('/posts/' . $post->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-link">Delete</button>
                            <a href="{{url('/posts/' . $post->id)}}">Edit</a>
                        </form>
                    @endif
                @endauth
            </div>
        </div>


    @endforeach

@else()
    <p>There is no answers yet, be first!</p>
@endif

