@if(isset($user))
    <img class="img-thumbnail" src="/storage/profile-pictures/{{ $user->profile_picture }}" style="max-width:150px;" />
@else
    <img class="img-thumbnail" src="/storage/profile-pictures/{{ auth()->user()->profile_picture }}" style="max-width:150px;" />
@endif