<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}"> <img src="/img/logo.png" id="logoNavbar" alt="PikachuIcon"> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <!--ICONA BAR-->
          <i class="bi bi-justify iconStyle"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     {{ __('navbar.category')}}
                    </a>

                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="categoryDropdown">
                    @foreach($categories as $category)
                        <li><a class="dropdown-item" href="{{ route('showbycategory', $category) }}">{{ $category->name }}</a></li>
                    @endforeach
                    </ul>
                  </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('announcements.all') }}">{{ __('navbar.ads')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('announcements.create') }}">{{ __('navbar.postAd')}}</a>
                </li>
                @guest
                {{-- ritornare su navbar --}}
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('navbar.enter')}}</a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        <li class="nav-item">
                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                        </li>
                    </ul>
                </li>
                @endguest
                @auth
                @if(Auth::user()->is_revisor)
                <li class="nav-item">
                    <a class="nav-link position-relative" href="{{ route('revisor.index') }}">{{ __('navbar.revisor')}}
                        @if((App\Models\Announcement::toBeRevisionedCount()) > 0)
                        <span class="position-absolute transalte-middle badge rounded-pill bg-danger ms-1">
                            {{App\Models\Announcement::toBeRevisionedCount()}}
                            <span class="visually-hidden">Unread message</span>
                        </span>
                        @endif
                    </a>
                </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                      <li class="nav-item"><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('form-logout').submit();"><button id="btnLogout" type="submit">Logout</button></a>
                        <form method="POST" action="{{route('logout')}}" style="display: none" id="form-logout">
                        @csrf
                        </form>
                        </a></li>
                    </ul>
                </li>
                @endauth
                <!--MULTILUNGUA-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="LanguagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('navbar.lang')}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="categoryDropdown">
                        <x-_locale lang="IT"/>
                        <x-_locale lang="EN"/>
                        <x-_locale lang="ES"/>
                    </ul>
                </li>
                <!--FINE MULTILINGUA-->
            </ul>
            <form class="d-none d-lg-flex search-box" action="{{ route('announcements.search') }}" method="GET">
                <input name="searched" type="search" placeholder="search...">
                <button id="icona" type="submit" class="icon">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>
    </div>
</nav>
