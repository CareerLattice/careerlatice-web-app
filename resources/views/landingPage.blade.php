<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CareerLatice</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/landingPage.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
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
                    <a href="signUp">
                        <button type="button" class="btn btn-outline-primary">Join Us</button>
                    </a>
                    <button type="button" class="btn btn-outline-dark">Sign In</button>
                </div>
            </div>
        </div>
    </nav>
    {{-- End of Navbar --}}

    <main>
        <section class="landingPage-1 hidden">
            <div class="container mb-5 hidden">
                <div class="row">
                    <div class="landing-about-container col-md-8 mt-5 hidden">
                        <h3 class="display-5">Empowering Your Careers <span>Through Connection</span></h3>
                        <p class="my-4 lead mt-3 ms-1 col-md-9">Empowers individuals to advance their careers and build professional networks through expert connections and skill development.</p>
                        
                        <div class="col-md-8 hidden">
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

                        <div class="landingPage-btn mt-3 hidden">
                            <a href="#Companies" class="btn btn-outline-primary btn-lg mt-3">Popular Companies</a>
                            <a href="#Jobs" class="btn btn-outline-dark btn-lg ms-2 mt-3">Popular Job Vacancies</a>    
                        </div>
                        
                    </div>
                    <div class="image col-md-4 mt-5 hidden">
                        <img src="{{ asset('assets/.jpg') }}" class="img-fluid" alt="CareerLatice">
                    </div>
                </div>

                <div class="promotion row container col-sm-12 hidden">
                    <div class="col-sm-6 col-md-3 mb-3">
                        <div class="card" style="background-color: #ffc09f">
                            <div class="card-body text-center hidden">
                                <i class="bi bi-building fs-1 text-primary"></i> <!-- Bootstrap icon for company -->
                                <h5 class="card-title mt-2">Hiring Company</h5>
                                <p class="card-text">Over <strong>500 reputable companies</strong> actively seeking talented professionals.</p>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-sm-6 col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body text-center hidden" style="background-color: #adf7b6">
                                <i class="bi bi-person-lines-fill fs-1 text-info"></i> <!-- Bootstrap icon for applicant -->
                                <h5 class="card-title mt-2">Applicants Each Year</h5>
                                <p class="card-text"><strong>Join thousands of applicants </strong>securing career-defining opportunities annually.</p>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-sm-6 col-md-3 mb-3 hidden">
                        <div class="card">
                            <div class="card-body text-center hidden" style="background-color: #a0ced9">
                                <i class="bi bi-people-fill fs-1 text-success"></i> <!-- Bootstrap icon for total applicants -->
                                <h5 class="card-title mt-2">Total Applicants</h5>
                                <p class="card-text"><strong>Over 10,000 applicants</strong> successfully placed in jobs worldwide.</p>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-sm-6 col-md-3 mb-3 hidden">
                        <div class="card hidden">
                            <div class="card-body text-center" style="background-color: #fcf5c7">
                                <i class="bi bi-person-check-fill fs-1 text-warning"></i> <!-- Bootstrap icon for total users -->
                                <h5 class="card-title mt-2">Total Users</h5>
                                <p class="card-text">More than <strong>50,000 users</strong> are benefiting from our career services.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="landingPage-2 hidden" id="landingPage-2">
            <div class="container hidden">
                <div class="row">
                    <div class="landing-company-container col-md-12 mt-2 hidden">
                        <h3 class="display-5">Unleash Your Potential with <span>Leading Companies!</span></h3>
                        <p class="my-4 lead mt-3 ms-1">💼 Connect with renowned employers looking for talented individuals ready to make a difference🌍!</p>
                    </div>
                </div>
            </div>

            <nav class="navbar-company-container navbar navbar-expand-lg hidden ">
                <div class="company-container container bg-white shadow-sm mb-3 hidden">
                    <ul class="navbar-company navbar-nav hidden">
                      <li class="navbar-company ">
                        <a class="nav-link" href="#">Technology and Information</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Finance and Insurance</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Consulting and Accounting</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Healthcare and Hospitality</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Show All Popular Company</a>
                      </li>
                    </ul>
                  </div>
              </nav>

              <div class="popular-company container hidden">
                {{-- Technology and Information category --}}
                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Technology and Information">
                    <img src="{{asset('/assets/tokopedia.jpeg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tokopedia</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>
                
                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Technology and Information">
                    <img src="{{asset('/assets/shopee.jpeg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Shopee</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>

                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Technology and Information">
                    <img src="{{asset('/assets/grab.jpeg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Grab</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>

                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Technology and Information">
                    <img src="{{asset('/assets/traveloka.jpeg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Traveloka</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>

                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Technology and Information">
                    <img src="{{asset('/assets/blibli.jpeg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Blibli</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>
                {{-- End of Technology and Information category --}}

                {{-- Start of Consulting and Accounting category--}}
                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Consulting and Accounting">
                    <img src="{{asset('/assets/deloitte.jpeg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Deloitte</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>

                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Consulting and Accounting">
                    <img src="{{asset('/assets/kpmg.jpeg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">KPMG</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>
                
                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Consulting and Accounting">
                    <img src="{{asset('/assets/ey.jpeg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">EY</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>

                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Consulting and Accounting">
                    <img src="{{asset('/assets/pwc.jpeg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">PwC</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>
                {{-- Enf of Consulting and Accounting category --}}

                {{-- Start of Finance and Insurance category--}}
                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Finance and Insurance">
                    <img src="{{asset('/assets/bbca.jpeg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Bank Central Asia</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>
                {{-- End of Finance and Insurance category --}}

                {{-- Start of Healthcare and Hospitality --}}
                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Healthcare and Hospitality">
                    <img src="{{asset('/assets/omnihospital.jpeg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Omni Hospital</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>
                {{-- Start of Healthcare and Hospitality --}}
            </div>
            
            <div class="promotion-company-container container hidden">
                <div class="row">
                    <div class="landing-company-bottom-container col-md-12 mt-2 hidden">
                        <h3 class="display-5">Seize Your Opportunity to Get Hired!</h3>
                        <p class="my-4 lead mt-3 ms-1">Join the ranks of top talents by applying to leading companies today! Whether you're looking to advance your career or start a new journey, countless opportunities await. Don't let the chance slip by — connect with reputable employers, showcase your skills, and land the job that aligns with your passion and goals</p>    
                    </div>
                </div>
            </div>
        </section>


        {{-- Start of Section Popular Job Vacancy --}}
        <section class="landingPage-3 hidden" id="landingPage-3">
            <div class="container hidden">
                <div class="row">
                    <div class="landing-vacancy-container col-md-12 mt-2 hidden">
                        <h3 class="display-5">Explore Exciting <span>Job Vacancies</span></h3>
                        <p class="my-4 lead mt-3 ms-1">🌈 Here are the leading roles attracting enthusiastic applications from job seekers🚀!</p>
                    </div>
                </div>
            </div>

              <div class="job-vacancy container hidden">
                <div class="job-vacancy-card card hidden" style="width: 18rem;" data-category="Job Vacancy">
                    <img src="{{asset('/assets/bbca.jpeg')}}" class="card-img-top" alt="...">
                    <div class="popular-job-card-container card-body">
                        <h5 class="card-title">DevOps Engineer</h5>
                        <p class="card-subtitle text-muted">Bank Central Asia</p>
                        <p class="card-text mt-1 mb-0">Bandung, Indonesia</p>
                        <p class="card-text mt-1">100+ Applicants</p>
                        <a href="#" class="btn btn-outline-primary">More Information</a>                
                    </div>
                </div>
                
                <div class="job-vacancy-card card hidden" style="width: 18rem;" data-category="Job Vacancy">
                    <img src="{{asset('/assets/grab.jpeg')}}" class="card-img-top" alt="...">
                    <div class="popular-job-card-container card-body">
                        <h5 class="card-title">UI/UX Designer</h5>
                        <p class="card-subtitle text-muted">Grab</p>
                        <p class="card-text mt-1 mb-0">Jakarta, Indonesia</p>
                        <p class="card-text mt-1">200+ Applicants</p>
                        <a href="#" class="btn btn-outline-primary">More Information</a>
                    </div>
                </div>

                <div class="job-vacancy-card card hidden" style="width: 18rem;" data-category="Job Vacancy">
                    <img src="{{asset('/assets/deloitte.jpeg')}}" class="card-img-top" alt="...">
                    <div class="popular-job-card-container card-body">
                        <h5 class="card-title">Project Manager</h5>
                        <p class="card-subtitle text-muted">Deloitte.</p>
                        <p class="card-text mt-1 mb-0">Jakarta, Indonesia</p>
                        <p class="card-text mt-1">300+ Applicants</p>
                        <a href="#" class="btn btn-outline-primary">More Information</a>
                    </div>
                </div>

                <div class="job-vacancy-card card hidden" style="width: 18rem;" data-category="Job Vacancy">
                    <img src="{{asset('/assets/shopee.jpeg')}}" class="card-img-top" alt="...">
                    <div class="popular-job-card-container card-body">
                        <h5 class="card-title">Mobile App Developer</h5>
                        <p class="card-subtitle text-muted">Shopee</p>
                        <p class="card-text mt-1 mb-0">Jakarta, Indonesia</p>
                        <p class="card-text mt-1">150+ Applicants</p>
                        <a href="#" class="btn btn-outline-primary">More Information</a>
                    </div>
                </div>

                <div class="job-vacancy-card card hidden" style="width: 18rem;" data-category="Job Vacancy">
                    <img src="{{asset('/assets/pwc.jpeg')}}" class="card-img-top" alt="...">
                    <div class="popular-job-card-container card-body">
                        <h5 class="card-title">System Administrator</h5>
                        <p class="card-subtitle text-muted">PwC</p>
                        <p class="card-text mt-1 mb-0">Jakarta, Indonesia</p>
                        <p class="card-text mt-1">50+ Applicants</p>
                        <a href="#" class="btn btn-outline-primary">More Information</a>
                    </div>
                </div>

                <div class="job-vacancy-card card hidden" style="width: 18rem;" data-category="Job Vacancy">
                    <img src="{{asset('/assets/tokopedia.jpeg')}}" class="card-img-top" alt="...">
                    <div class="popular-job-card-container card-body">
                        <h5 class="card-title">Tech Intern</h5>
                        <p class="card-subtitle text-muted">Tokopedia</p>
                        <p class="card-text mt-1 mb-0">Jakarta, Indonesia</p>
                        <p class="card-text mt-1">500+ Applicants</p>
                        <a href="#" class="btn btn-outline-primary">More Information</a>
                    </div>
                </div>
                
                {{-- End of Popular Job Vacancy --}}
            </div>
        </section>

        <section>

        </section>

    </main>

    {{-- Start of Footer --}}
    <footer class="pt-5 pb-4 hidden">
        <div class="container text-center text-md-left hidden">

            <div class="footer-container row text-center text-md-left hidden">

                <div class="footer-left-container col md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="mb-4 font-weight-bold"><span class= "first">Career</span><span class="second">Latice</span></h5>
                    <p>Empowers individuals to advance their careers and build professional networks through expert connections and skill development.</p>

                </div>

                <div class="footer-right-container col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class=" mb-4 font-weight-bold">Services</h5>
                    <p>
                        <a href="#Home" class="text-dark" style="text-decoration: none">Home</a>
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
                        <i class="bi bi-envelope-fill me-3"></i>careerlatice@gmail.com
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
                    <p class="text-center"> ©2024 All Rights Reserved
                    <a href="" style="text-decoration: none"><span class= "first">Career</span><span class="second">Latice</span>
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

<!-- FontAwesome Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- Bootstrap JS (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>



    
    

    {{-- Bootstrap 5 --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB30NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    {{-- End of Bootstrap 5 --}}
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
