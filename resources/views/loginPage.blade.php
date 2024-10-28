<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Account</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/landingPage.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="icon" href="{{asset('assets/logo.png')}}">
    <link href="{{ asset('css/loginPage.css') }}" rel="stylesheet">

</head>
<body>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container mt-3 mb-3">
            <img src="{{ asset('assets/CareerLatice.jpg') }}" class="img" alt="CareerLatice">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between w-100" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('landingPage')}}" id="Home">Home</a>
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
                    <a href="{{ route('signUpPage') }}"><button type="button" class="btn btn-outline-primary">Join Us</button></a>
                    <a href="{{ route('loginPage') }}"><button type="button" class="btn btn-outline-dark">Sign In</button></a>
                </div>
            </div>
        </div>
    </nav> 
<!-- Navbar End -->

<!-- Main Program -->
 <main>
 <div class="container-fluid pb-5 d-flex justify-content-around align-items-center w-100">
    <div class="left gradient-bg">
        <div class="company text-center mt-5 mb-5 text-dark col-6 "> 
            <h3>For <span class="text-primary">Company<span></h3>
            <p>We are the market for technical interview platform <br> and hire developers with the right skill</p>
            <a href="{{route('company.loginCompany')}}"><button class="loginButton mb-4">Login</button></a>
            <p>Don't Have Account <br> <a href="{{route('company.signUpCompany')}}" style="text-decoration: none"><span class="fw-bold text-dark">Sign Up</span></a></p>
        </div>
    </div>
    <!-- <div class="divider"></div> -->
    <div class="right">
        <div class="developer text-center mt-5 mb-5 text-dark col-6 ">
            <h3>For Developer</h3>
            <p>Join over 15 million developers <br> prepare for interviews and get hired</p>
            <a href="{{route('user.loginUser')}}"><button class="loginButton mb-4">Login</button></a>
            <p>Don't Have Account <br>
                <a href="{{route('user.signUpUser')}}" style="text-decoration: none">
                <span class="fw-bold text-dark">Sign Up</span></a>
            </p>
        </div>
    </div>
</div>
</main>

<!-- End Main -->


<!-- Footer Start -->

{{-- Start of Footer --}}
<footer class="pt-5 pb-4 hidden">
        <div class="container text-center text-md-left hidden">

            <div class="footer-container row text-center text-md-left hidden">

                <div class="footer-left-container col md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="mb-4 font-weight-bold"><span class= "first">Career</span><span class="second">Lattice</span></h5>
                    <p>Empowers individuals to advance their careers and build professional networks through expert connections and skill development.</p>

                </div>

                <div class="footer-right-container col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class=" mb-4 font-weight-bold">Services</h5>
                    <p>
                        <a href="{{route('landingPage')}}" class="text-dark" style="text-decoration: none">Home</a>
                    </p>
                    <p>
                        <a href="#Job" class="text-dark" style="text-decoration: none">Find a Job</a>
                    </p>
                    <p>
                        <a href="#Company" class="text-dark" style="text-decoration: none">Company</a>
                    </p>
                    <p>
                        <a href="#Contact" class="text-dark" style="text-decoration: none">Contact</a>
                    </p>
                </div>

                <div class="footer-right-container col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="mb-4 font-weight-bold">Useful Links</h5>
                    <p>
                        <a href="#!" class="text-dark" style="text-decoration: none">Privacy Policy</a>
                    </p>
                    <p>
                        <a href="#!" class="text-dark" style="text-decoration: none">Terms of Service</a>
                    </p>
                    <p>
                        <a href="#!" class="text-dark" style="text-decoration: none">Site Map</a>
                    </p>
                    <p>
                        <a href="#!" class="text-dark" style="text-decoration: none">Settings</a>
                    </p>
                </div>

                <div class="footer-right-container col-md-4 col-xl-3 mx-auto mt-3">
                    <h5 class="mb-4 font-weight-bold">Contact</h5>
                    <p>
                        <i class="bi bi-house-door-fill me-3"></i>Jakarta, Indonesia</p>
                    <p>
                        <i class="bi bi-envelope-fill me-3"></i>careerlattice@gmail.com
                    </p>
                    <p>
                        <i class="bi bi-telephone-fill me-3"></i>+62 08942012049
                    </p>
                    <p>
                        <i class="bi bi-calendar-fill me-3"></i>Since 10/03/2024
                    </p>
                </div>
            </div>

            <hr class="mb-4">

            <div class="footer-bottom-container row align-items-center hidden">
                <div class="rights col-md-7 col-lg-8">
                    <p class="text-center"> <strong>©2024 All Rights Reserved</strong>
                    <a href="" style="text-decoration: none"><span class= "first">Career</span><span class="second">Lattice</span>
                    </a>
                </p>
                </div>

                <div class="col-md-5 col-lg-2">
                    <div class="text-center">
                        <ul class="ul-container list-unstyled list-inline">
                            <li class="list-inline-item">
                                <a href="" class="btn-floating btn-sm text-dark">
                                    <i class="bi bi-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="btn-floating btn-sm text-dark">
                                    <i class="bi bi-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="btn-floating btn-sm text-dark">
                                    <i class="bi bi-google"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="btn-floating btn-sm text-dark">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="btn-floating btn-sm text-dark">
                                    <i class="bi bi-instagram"></i>
                                </a>
                            </li>
                        </p>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</footer>
    {{-- End of Footer --}}

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    {{-- Start of Bootstrap 5 --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB30NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    {{-- End of Bootstrap 5 --}}
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html