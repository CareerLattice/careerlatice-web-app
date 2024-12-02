<style>
    .footer-container h5 {
    font-weight: bold;
    text-align: justify;
    font-size: 1.5rem;
    }

    .footer-container p {
        font-size: 1rem;
        text-align: justify;
        color: grey;
    }

    .footer-right-container a {
        color: #000;
        text-decoration: none;
        transition: color 0.3s ease, text-decoration 0.3s ease;
    }

    .footer-right-container a:hover {
        color: #007bff;
        text-decoration: underline;
    }

    .ul-container i {
        font-size: 1.3rem;
    }

    .first {
        color: #682b90;
        font-weight: bolder;
    }

    .second {
        color: #7869cd;
        font-weight: bolder;
    }

</style>

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
                    <a href="{{ route('landingPage') }}" class="text-dark" style="text-decoration: none">Home</a>
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
                    <a href="{{route('settings')}}" class="text-dark" style="text-decoration: none">Settings</a>
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

            <div class="col-md-5 col-lg-3">
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
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
