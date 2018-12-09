@extends('layouts.app')

@section('content')

    @include('settings.profilePictureChange')

    @include('settings.changeEmail')

    @include('settings.changePassword')

    @include('layouts.errors')
@endsection
