<header class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">
        <img src="{{ asset('media/logo.png') }}" alt="Flash" width="120" height="40">
      </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">Se Déconnecter</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" >
          @csrf
        </form>
      </div>
    </div>
</header>

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('dashboard/event') ? 'active' : '' }}" href="{{ route('eventmanaging') }}">
            <span data-feather="sunset"></span>
            Event
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('dashboard/gallery') ? 'active' : '' }}" href="{{ route('gallerymanaging') }}">
            <span data-feather="image"></span>
            Gallerie
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('dashboard/dj') ? 'active' : '' }}" href="{{ route('djmanaging') }}">
            <span data-feather="disc"></span>
            DJ's
          </a>
        </li>
      </ul>
    </div>
  </nav>