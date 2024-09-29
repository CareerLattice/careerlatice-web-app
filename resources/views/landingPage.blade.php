<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CareerLatice</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/landingPage.css') }}" rel="stylesheet">
    {{-- End of Bootstrap 5 --}}
</head>
<body>
    {{-- Start of Navbar --}}
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container mt-3 mb-3">
            <img src="{{ asset('assets/CareerLatice.jpg') }}" class="img" alt="CareerLatice">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between w-100" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Find a Job</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Contact</a>
                    </li>
                </ul>
                <div class="d-grid gap-3 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-outline-primary">Join Us</button>
                    <button type="button" class="btn btn-outline-dark">Sign In</button>
                </div>
            </div>
        </div>
    </nav>
    {{-- End of Navbar --}}

    <main>
        <section class="landingPage-1">
            <div class="container">
                <div class="row">
                    <div class="landing-about-container col-md-8 mt-5">
                        <h3 class="display-5">Empowering Your Careers <span>Through Connection</span></h3>
                        <p class="my-4 lead mt-3 ms-1 col-md-9">Empowers individuals to advance their careers and build professional networks through expert connections and skill development.</p>
                        
                        <div class="col-md-8 ">
                            <div class="offer">
                                <ul class="list-unstyled ">
                                    <li>💼 Personalized Career Guidance</li>
                                    <li>🌐 Networking Opportunities</li>
                                </ul>
                            </div>

                            <div class="offer">
                                <ul class="list-unstyled ">
                                    <li>📚 Access to Expert-Led Courses</li>
                                    <li>🔍 Job Matching Services</li>
                                </ul>
                            </div>
                        </div>

                        <div class="mt-3">
                            <a href="#Companies" class="btn btn-outline-primary btn-lg mt-2">Visit All Company</a>
                            <a href="#Jobs" class="btn btn-outline-dark btn-lg ms-2 mt-2">View Job Vacancy</a>    
                        </div>
                        
                    </div>
                    <div class="col-md-4 mt-5">
                        {{-- <img src="{{ asset('assets/LandingPage.jpg') }}" class="img-fluid" alt="CareerLatice"> --}}
                    </div>
                </div>
            </div>

        </section>
        
    </main>

    {{-- Bootstrap 5 --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    {{-- End of Bootstrap 5 --}}
</body>
</html>
