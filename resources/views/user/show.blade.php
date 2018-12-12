@extends('layouts.app')

@section('content')
   <section>
       <h2>{{$user->name}}</h2>
       @if($user->is_admin)
           <i>Admin</i>
       @endif
       @include('user.profile-picture')
       <p>Member since {{$user->getCreatedAtFormatted()}}</p>

       @include('user.stats')

   </section>
@endsection
