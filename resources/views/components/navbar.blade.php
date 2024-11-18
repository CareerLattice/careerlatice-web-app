<style>
    .navbar {
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 1rem 0;
    }

    .logo-right {
        color: darkblue;
    }

    .navbar-brand {
        font-weight: bold;
        font-size: 1.5rem;
    }

    .navbar-nav {
        gap: 40px;
        font-size: 1.2rem;
    }

    .nav-link {
        color: #333;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .nav-link:hover {
        color: #007bff;
    }

    .img {
        width: 13%;
    }

    .dropdown-menu a:focus, .dropdown-menu a:active {
        outline: none;
        box-shadow: none;
    }
</style>

<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container mt-3 mb-3">
        <img src="{{asset('assets/CareerLatice.jpg')}}" class="img" alt="CareerLatice" onclick="window.location='/'">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between w-100" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('user.home')) active @endif" aria-current="page" href="{{route('user.home')}}" id="Home">Home</a>
                    </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('jobs')) active @endif" aria-current="page" href="{{route('jobs')}}" id="Job">Find a Job</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('companies')) active @endif" aria-current="page" href="{{route('companies')}}" id="Company">Company</a>
                </li>
            </ul>

            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('password.request')}}">Change Password</a></li>
                        <li><a class="dropdown-item" href="#">Change Language</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </li>
            @endauth

            @guest
                <div class="d-grid gap-3 d-md-flex justify-content-md-end">
                    <a href="{{route('signUpPage')}}">
                        <button type="button" class="btn btn-outline-primary">Join Us</button>
                    </a>
                    <a href="{{route('loginPage')}}">
                        <button type="button" class="btn btn-outline-dark">Sign In</button>
                    </a>
                </div>
            @endguest
        </div>
    </div>
</nav>
