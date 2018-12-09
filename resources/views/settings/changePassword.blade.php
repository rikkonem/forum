<section>
    <h2>Change password</h2>
    <form method="post" action="{{url('/change-password')}}">
        @csrf
        <div class="form-group">
            <label for="title">Current password</label>
            <input type="password" name="current-password" class="form-control {{ Session::has('error') ? ' is-invalid' : '' }}" required>
        </div>
        <div class="form-group">
            <label for="title">New password</label>
            <input type="password" name="new-password" class="form-control {{ $errors->has('new-password') ? ' is-invalid' : '' }}" required>
        </div>
        <div class="form-group">
            <label for="title">Confirm password</label>
            <input type="password" name="confirmed-password" class="form-control {{ $errors->has('confirmed-password') ? ' is-invalid' : '' }}" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Change password" class="btn btn-primary">
        </div>
    </form>
</section>