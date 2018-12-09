@auth
    <form method="post" action="{{url('/threads/' . $thread->id . '/posts')}}">
        @csrf
        <div class="form-group">
            <textarea name="body" class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Respond</button>
        </div>
    </form>

    @include('layouts.errors')

@endauth

@guest()
    <p><a href="{{route('login')}}">Login</a> to contribute a discussion</p>
@endguest