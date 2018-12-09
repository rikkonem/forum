@if($errors->any())
    <section class="alert alert-danger" role="alert">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </section>
@elseif(Session::has('error'))
    <section class="alert alert-danger">
        <p>{{ Session::get('error') }}</p>
    </section>
@endif

