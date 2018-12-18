<footer>

    @if($tags->count())
        <form method="get" action="{{url('/threads-with-tags')}}">
            Tags:
            @foreach($tags as $tag)
                @if(!empty($selectedTags))
                        <input type="checkbox" name="tags[]" value="{{$tag->slug}}" onchange="this.form.submit()"
                        {{ in_array($tag->slug, $selectedTags) ? "checked" : null}}/>{{$tag->slug}}
                @else
                    <input type="checkbox" name="tags[]" value="{{$tag->slug}}" onchange="this.form.submit()"/>{{$tag->slug}}
                @endif
            @endforeach
        </form>
    @endif
</footer>