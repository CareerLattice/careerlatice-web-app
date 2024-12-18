<style>
    .navbar {
        background-color: #ffffff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 1rem 0;
        border-bottom: 2px solid #f1f1f1; 
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
        width: 15%;
        transition: width 0.3s ease;
    }

    .dropdown-menu a:focus, .dropdown-menu a:active {
        outline: none;
        box-shadow: none;
    }

    @media (max-width: 989px) {
        .img {
            width: 30%;
        }
    }

    @media(max-width: 485px){
        .img {
            width: 40%;
        }
    }

    .accordion {
        position: relative;
        overflow: visible;
    }

    .accordion-body a {
        text-decoration: none;
    }

    .accordion-body button {
        text-decoration: none;
    }

    .accordion-collapse {
        position: absolute;
        top: 60px;
        right: 0;
        z-index: 1000;
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 8px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 200px;
    }

    .accordion-collapse.show {
        display: block !important;
    }

    .accordion-body {
        padding: 1rem;
    }

    .accordion-button {
        padding: 0;
        border: none;
        background: transparent;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .accordion-button img {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        object-fit: cover;
        border: 2px solid #ddd; 
    }

    .accordion-button::after {
        display: none;
    }

    .accordion-item {
        border: none;
    }

    .accordion-collapse {
        border: none;
        box-shadow: none;
    }

    .accordion-button {
        border: none;
    }

    .accordion-button:focus {
        outline: none;
        box-shadow: none;
    }

    .accordion-button:active {
        background-color: transparent;
        border: none;
    }

    .accordion-button:focus, .accordion-button:active {
        background-color: transparent !important;
        border: none !important;
    }

    .dropdown-menu {
        border-radius: 8px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>


<nav class="navbar navbar-expand-lg bg-white shadow-lg">
    <div class="container mt-3 mb-3">
        <img src="{{asset('assets/CareerLatice.jpg')}}" class="img" alt="CareerLatice" onclick="window.location='/'">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse justify-content-between w-100" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('home')) active @endif" aria-current="page" href="{{route('home')}}" id="Home">{{__('lang.Home')}}</a>
                    </li>

                    @if (Auth::user()->role == 'applier')
                        <li class="nav-item">
                            <a class="nav-link @if(request()->routeIs('jobs')) active @endif" aria-current="page" href="{{route('jobs')}}" id="Job">{{__('lang.Find a Job')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(request()->routeIs('companies')) active @endif" aria-current="page" href="{{route('companies')}}" id="Company">{{__('lang.Company')}}</a>
                        </li>
                    @elseif (Auth::user()->role == 'company')
                        <li class="nav-item">
                            <a class="nav-link @if(request()->routeIs('company.listJob')) active @endif" aria-current="page" href="{{route('company.listJob')}}" id="Job">{{__('lang.Created Job')}}</a>
                        </li>
                    @endif
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('jobs')) active @endif" aria-current="page" href="{{route('jobs')}}" id="Job">{{__('lang.Find a Job')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('companies')) active @endif" aria-current="page" href="{{route('companies')}}" id="Company">{{__('lang.Company')}}</a>
                    </li>
                @endguest
            </ul>

            @auth
                <ul class="navbar-nav">
                    <li class="nav-item dropdown d-flex justify-content-between align-items-center">
                        @if (Auth::user()->role == 'applier')
                            <a href="{{route('user.premiumUser')}}" class="btn btn-outline-success me-3">{{__('lang.Premium')}}</a>
                        @endif

                        <div class="accordion" id="userAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingUser">
                                    <button class="accordion-button collapsed p-0 border-0 bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUser" aria-expanded="false" aria-controls="collapseUser">
                                        <img src="{{asset('upload/profile_picture/' . Auth::user()->profile_picture)}}" class="rounded-circle object-fit-fill" alt="Photo Profile" width="50px;" height="50px;">
                                    </button>
                                </h2>
                                <div id="collapseUser" class="accordion-collapse collapse" aria-labelledby="headingUser" data-bs-parent="#userAccordion">
                                    <div class="accordion-body">
                                        @if (Auth::user()->role == 'applier')
                                            <a class="btn btn-link w-100 text-start" href="{{route('user.editProfile')}}">{{__('lang.Edit Profile')}}</a>
                                        @elseif (Auth::user()->role == 'company')
                                            <a class="btn btn-link w-100 text-start" href="{{route('company.profile')}}">{{__('lang.Edit Profile')}}</a>
                                        @endif
                                        <a class="btn btn-link w-100 text-start" href="{{route('settings')}}">{{__('lang.Settings')}}</a>
                                        <hr>
                                        <form action="{{route('logout')}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-link w-100 text-start text-danger">{{__('lang.Log Out')}}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            @endauth

            @guest
                <div class="d-grid gap-3 d-md-flex justify-content-md-end">
                    <a href="{{route('signUpPage')}}">
                        <button type="button" class="btn btn-outline-primary">{{__('lang.Join Us')}}</button>
                    </a>
                    <a href="{{route('login')}}">
                        <button type="button" class="btn btn-outline-dark">{{__('lang.Sign In')}}</button>
                    </a>
                </div>
            @endguest
        </div>
    </div>
</nav>
