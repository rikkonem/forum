<section>
    <h2>Change Email</h2>
    <form method="post" action="{{url('/change-email')}}">
        @csrf
        <div class="form-group">
            <label for="title">New email</label>
            <input type="email" name="new-email" class="form-control {{ $errors->has('new-email') ? ' is-invalid' : '' }}" required>
        </div>
        <div class="form-group">
            <label for="title">password</label>
            <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" required>
        </div>

        <div class="form-group">
            <input type="submit" value="Change email" class="btn btn-primary">
        </div>
    </form>
</section>