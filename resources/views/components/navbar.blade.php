<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container mt-3 mb-3">
        <img src="{{asset('assets/CareerLatice.jpg')}}" class="img" alt="CareerLatice">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between w-100" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#" id="Home">Home</a>
                </li>                                     
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#" id="Job">Find a Job</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#" id="Company">Company</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#" id="Contact">Contact</a>
                </li>
            </ul>
            <div class="d-grid gap-3 d-md-flex justify-content-md-end">
                <a href="{{route('signUpPage')}}">
                    <button type="button" class="btn btn-outline-primary">Join Us</button>
                </a>
                <a href="{{route('loginPage')}}">
                    <button type="button" class="btn btn-outline-dark">Sign In</button>
                <a>
            </div>
        </div>
    </div>
</nav>