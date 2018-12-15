<footer>
    @if($tags->count())
        Tags:
        @foreach($tags as $tag)
            <a href="{{url('threads-with-tag/' . $tag->slug)}}" class="badge badge-light">{{$tag->slug}}</a>
        @endforeach
    @endif
</footer>