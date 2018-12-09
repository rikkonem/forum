@extends('layouts.app')

@section('content')
    <section>
      <form method="post" action="{{url('threads')}}">
          @csrf
          <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}">
          </div>
          <div class="form-group">
              <label for="body">Body</label>
              <textarea name="body" class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}"></textarea>
          </div>
          <div class="form-group">
             <input type="submit" value="create" class="btn btn-primary">
          </div>
      </form>
    </section>
    @include('layouts.errors')
@endsection
