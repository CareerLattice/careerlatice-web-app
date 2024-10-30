<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CareerLattice</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/landingPage.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    {{-- End of Bootstrap 5 --}}
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container mt-3 mb-3">
            <img src="{{asset('assets/CareerLatice.jpg')}}" class="img" alt="CareerLatice">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between w-100" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('user.home')}}" id="Home">Home</a>
                    </li>                                     
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#" id="Job">Find a Job</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#" id="Company">Company</a>
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

    <div class="container mt-4">
        <h1>tes</h1>
    </div>
    
    
{{-- Start of Font --}}
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
{{-- End of Font --}}
    {{session('user_id')}}
{{-- Start of Bootstrap 5 --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB30NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
{{-- End of Bootstrap 5 --}}
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>