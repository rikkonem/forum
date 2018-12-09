<section>
    <h2>Change profile picture</h2>
    @include('user.profile-picture')
    <form method="post" action="{{url('/change-profile-picture')}}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <input type="file" class="btn btn-default" name="profile_picture">
        </div>

        <div class="form-group">
            <input type="submit" value="Change Picture" class="btn btn-primary">
        </div>
    </form>
</section>