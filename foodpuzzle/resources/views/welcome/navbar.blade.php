<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top"  style="height:50px;">
  <!-- Left Side Of Navbar -->
  <!-- this part need to be fixed, user need to verify their email before using. -->
  <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item">
          <a class="nav-link" href="/create">Create</a>
      </li> -->
      <!-- <li class="nav-item">
          <a class="nav-link" href="/recipe/favorites">Favorites</a>
      </li> -->
    </ul>
  </div>
  <!-- Middle Of Navbar -->
  <div class="mx-auto order-0">
    <a class="navbar-brand mx-auto" href="/">FoodPuzzle</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
        <span class="navbar-toggler-icon"></span>
    </button>
  </div>
  <!-- Right Side Of Navbar -->
  <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
    <ul class="navbar-nav ml-auto">
        <!-- if user have not log in yet, navbar will show LogIn and SignUp button. -->
        @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
        <!-- if user already log in, navbar will show user's name. -->
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/usermain"
                 onclick="">
                  {{ __('My Recipe') }}
              </a>

              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </li>
        @endguest      
    </ul>
  </div>
</nav>

