<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testing CV</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link href="{{ asset('css/landingPage.css') }}" rel="stylesheet">

</head>
<body>
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
                            @if (Auth::user()->role == 'applier')
                                <li><a class="dropdown-item" href="{{route('updateUser')}}">Edit Profile</a></li>
                            @elseif (Auth::user()->role == 'company')
                                <li><a class="dropdown-item" href="">Edit Profile</a></li>
                            @endif

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
                        <a href="{{route('login')}}">
                            <button type="button" class="btn btn-outline-dark">Sign In</button>
                        </a>
                    </div>
                @endguest
            </div>
        </div>
    </nav>

    <div class="container m-0 p-0 mt-5 ms-5">
        <div class="d-flex flex-column">
            <div class="mb-3">
                <a href="{{route('getCV', ['filename' => 'Localization.pdf'])}}" class="btn btn-primary rounded-pill" target="_blank">CV Applicant 1</a>
            </div>
            <div>
                <a href="{{route('getCV', ['filename' => 'Kalender.pdf'])}}" class="btn btn-primary rounded-pill" target="_blank">CV Applicant 2</a>
            </div>
        </div>
    </div>

    @include('components.footer')
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>
