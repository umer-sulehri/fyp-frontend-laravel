<style>
    
</style>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">
            <i class="bi-back"></i>
            <span>Video2Text</span>
        </a>

        <div class="d-lg-none ms-auto me-4">
            @auth
                <div class="dropdown">
                    <a href="#" class="navbar-icon bi-person smoothscroll dropdown-toggle" id="mobileUserDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="mobileUserDropdown">
                        <li><a class="dropdown-item" href="{{ route('home') }}"><i class="bi-speedometer2 me-2"></i>Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="bi-box-arrow-right me-2"></i>Logout
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ url('/login') }}" class="navbar-icon bi-person smoothscroll"></a>
            @endauth
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5 me-lg-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ url('/home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('features') ? 'active' : '' }}" href="{{ url('/features') }}">More Features</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('pricing') ? 'active' : '' }}" href="{{ url('/pricing') }}">Pricing</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a>
                </li>
            </ul>

            <div class="d-none d-lg-flex">
                @auth
                    <!-- User Dropdown for Desktop -->
                    <div class="dropdown">
                        <a href="#" class="navbar-icon bi-person smoothscroll dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ url('/userdashboard') }}"><i class="bi-speedometer2 me-2"></i>Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="bi-box-arrow-right me-2"></i>Logout
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <!-- Login Icon for Desktop -->
                    <a href="{{ url('/login') }}" class="navbar-icon bi-person smoothscroll"></a>
                @endauth

                <!-- Language Selector Dropdown -->
                <div class="dropdown d-inline-block ms-3">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-globe"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item" href="{{ url('/lang/en') }}">English</a></li>
                        <li><a class="dropdown-item" href="{{ url('/lang/es') }}">Urdu</a></li>
                        <li><a class="dropdown-item" href="{{ url('/lang/fr') }}">Punjabi</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>