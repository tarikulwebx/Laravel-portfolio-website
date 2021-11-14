<nav class="navbar navbar-expand-lg navbar-dark orange fixed-top scrolling-navbar">
    <div class="container-fluid">
        <a class="navbar-brand text-uppercase d-flex align-items-center" href="{{ url('/') }}">
            <img class="mr-2" src="{{ asset('images/tarikul.png') }}" alt="">
            <span>Tarikul</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#top-navbar" aria-controls="top-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="top-navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#courses">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#projects">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#articles">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#contact">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto nav-flex-icons">
                @if ($about->facebook != null)
                <li class="nav-item">
                    <a href="{{ $about->facebook }}" class="nav-link waves-effect waves-light">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                @endif

                @if ($about->twitter != null)
                <li class="nav-item">
                    <a href="{{ $about->twitter }}" class="nav-link waves-effect waves-light">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                @endif

                @if ($about->github != null)
                <li class="nav-item">
                    <a href="{{ $about->github }}" class="nav-link waves-effect waves-light">
                        <i class="fab fa-github"></i>
                    </a>
                </li>
                @endif

                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        @if (Auth::user())
                            {{ Auth::user()->name }}
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                        @if (Auth::guest())
                            <a class="dropdown-item" href="{{ url('/login') }}"><i class="fas fa-sign-in-alt mr-2"></i> Login</a>
                            <a class="dropdown-item" href="{{ url('/register') }}"><i class="fas fa-user-circle    mr-2"></i> Register</a>
                            @else
                            @if (Auth::user()->is_admin() && Auth::user()->is_active == 1)
                                <a class="dropdown-item" href="{{ url('/admin') }}"><i class="fas fa-user-cog   mr-2 "></i> Admin</a>
                            @endif

                            @if (Auth::user())
                                <a class="dropdown-item" href="{{ route('show-profile', Auth::user()->slug) }}"><i class="fas fa-user-alt    mr-2"></i> Profile</a>
                            @endif
                            
                            <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-in-alt mr-2"></i> Logout</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }} </form>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>