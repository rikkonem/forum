@if(Session::has('message'))
    <div class="alert alert-primary">{{ Session::get('message') }}</div>
@endif