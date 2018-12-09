<p>User created <strong>{{$user->threads()->count()}}</strong> threads.
    @if(auth()->user() && auth()->user()->id == $user->id)
        <a href="{{url('my-threads')}}">Show my threads</a>
    @endif
</p>
<p>User created <strong>{{$user->posts()->count()}}</strong> posts</p>


<div class="card">
<div class="card-header">
    Latest user thread
</div>
<div class="card-body">
    @if($user->latestThread() != null)
        <h5 class="card-title">{{ $user->latestThread()->title}}</h5>
        <a href="{{url('threads/' . $user->latestThread()->id)}}" class="btn btn-primary">Go to thread</a>
    @else
        <p class="card-text">User has not posted any threads yet.</p>
    @endif
</div>
</div>

<div class="card mt-2">
<div class="card-header">
    Latest user post
</div>
<div class="card-body">
    @if($user->latestPost() != null)
        <h5 class="card-title">Re: {{$user->latestPost()->thread->title}}</h5>
        <p class="card-text">{{$user->latestPost()->body}}</p>
        <a href="{{url('threads/' . $user->latestPost()->thread_id)}}" class="btn btn-primary">Go to thread</a>
    @else
        <p class="card-text">User has not posted any posts yet.</p>
    @endif

</div>
</div>