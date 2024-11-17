<style>
    .navbar {
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 1rem 0;
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

    .btn {
        font-weight: 500;
    }

    .img {
        width: 13%;
        height: auto;
    }
</style>

<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container" style="gap: 20px">
        <img src="{{asset('assets/CareerLatice.jpg')}}" class="img" alt="CareerLatice" onclick="goToLandingPage()">
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
            <!-- Center the navigation links -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('user.home')}}" id="Home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('jobs')}}" id="Job">Find a Job</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('user.companies')}}" id="Company">Company</a>
                </li>
            </ul>
            <div class="d-grid gap-3 d-md-flex justify-content-md-end">
                <a href="{{route('signUpPage')}}">
                    <button type="button" class="btn btn-outline-primary">Join Us</button>
                </a>
                <a href="{{route('loginPage')}}">
                    <button type="button" class="btn btn-outline-dark">Sign In</button>
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    function goToLandingPage() {
        window.location.href = '/'; 
    }   
</script>
