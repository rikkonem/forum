<nav class="nav flex-column">
    @auth
        <p class="nav-link">
           Hello,  <a href="{{url('/users/' . auth()->user()->id)}}">{{auth()->user()->name}}</a>
        </p>
    @endauth
      <a href="{{url('/')}}" class="nav-link">Home page</a>
      <a href="{{url('threads/create')}}" class="nav-link">Create new thread</a>
      @guest
          <a href="{{route('login')}}" class="nav-link">Login</a>
          <a href="{{route('register')}}" class="nav-link">Register</a>
      @endguest

      @auth
          <a href="{{url('settings')}}" class="nav-link">Settings</a>
          <a href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();" class="nav-link">
              Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
      @endauth
</nav>

