@extends('layouts.app')

@section('content')
    <section>
        @if(!empty($thread))
      <form method="post" action="{{url('/threads/' . $thread->id)}}">
          @csrf
          @method('patch')
          <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{$thread->title}}" required>
          </div>
          <div class="form-group">
              <label for="body">Body</label>
              <textarea name="body" class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}" required>{{$thread->body}}</textarea>
          </div>
          <div class="form-group">
             <input type="submit" value="send" class="btn btn-primary">
          </div>
      </form>
            @endif
    </section>
    @include('layouts.errors')
@endsection
