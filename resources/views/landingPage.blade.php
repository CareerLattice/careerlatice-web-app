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
    {{-- <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}"> --}}
    <link rel="icon" href="{{asset('assets/logo.png')}}">
    {{-- End of Bootstrap 5 --}}
    
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    {{-- End of Google Fonts --}}


</head>
<body>
    {{-- Start of Navbar --}}
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
                        <a class="nav-link" aria-current="page" href="{{route('user.jobs')}}" id="Job">Find a Job</a>
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
                    <a>
                </div>
            </div>
        </div>
    </nav>
    {{-- End of Navbar --}}

    <main>
        <section class="landingPage-1 hidden">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/sliders5.jpg') }}" class="carousel-image d-block w-100" alt="Slide 1">
                        <div class="carousel-caption position-absolute bottom-0 start-0 end-0 p-4">
                            <h5 class="fw-bold fs-1 fs-sm-3 fs-md-2 fs-lg-1" style="color: #682b90">
                                Welcome to <span style="color: #7869cd">CareerLattice</span>.
                            </h5>
                            <p class="fw-bold fs-5 fs-sm-6 fs-md-4 fs-lg-3">Empowering Your Careers Through Connection. Join us to explore your strength</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/sliders7.jpg') }}" class="carousel-image d-block w-100" alt="Slide 2">
                        <div class="carousel-caption position-absolute bottom-0 start-0 end-0 p-4">
                            <h5 class="fw-bold fs-1 fs-sm-3 fs-md-2 fs-lg-1" style="color: #682b90">
                                Join Top Leading <span style="color: #7869cd">Companies</span>
                            </h5>
                            <p class="fw-bold fs-5 fs-sm-6 fs-md-4 fs-lg-3">Connect with renowned employers looking for talented individuals ready to make a difference.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/sliders1.jpg') }}" class="carousel-image d-block w-100" alt="Slide 3">
                        <div class="carousel-caption position-absolute bottom-0 start-0 end-0 p-4">
                            <h5 class="fw-bold fs-1 fs-sm-3 fs-md-2 fs-lg-1" style="color: #682b90">
                                Explore Exciting <span style="color: #7869cd">Job Vacancies</span>
                            </h5>
                            <p class="fw-bold fs-5 fs-sm-6 fs-md-4 fs-lg-3">Discover exciting job opportunities tailored just for you – start exploring now!</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            
        
            <div class="container">
                <!-- First Section: Heading and Description -->
                <div class="col-12 col-md-7">
                    <h2 class="fw-bold fs-1 mt-5">A Quick Look at <span style="color: #7869cd">Our Journey</span></h2>
                    <p class="mt-3 fw-bold" style="text-align: justify; color: gray">
                        CareerLattice is an innovative platform dedicated to empowering individuals by helping them advance their careers and build strong professional networks.
                    </p>
                </div>
            
                <div class="row">
                    <div class="col-12 col-md-4 mt-3 mb-3">
                        <h3 class="fw-bold text-center" style="color: #682b90">Jan 2024</h3>
                        <p style="color: gray" class="text-center">
                            <i class="bi bi-person-lines-fill">Over <strong>500 active total users</strong> benefiting from our platform.</i>
                        </p>
                    </div>
            
                    <div class="col-12 col-md-4 mt-3 mb-3">
                        <h3 class="fw-bold text-center" style="color: #682b90">Apr 2024</h3>
                        <p style="color: gray" class="text-center">
                            <i class="bi bi-people-fill"><strong>Achieved by over 500 active users</strong> who are securing career-defining opportunities annually.</i>
                        </p>
                    </div>
            
                    <div class="col-12 col-md-4 mt-3 mb-3">
                        <h3 class="fw-bold text-center" style="color: #682b90">Oct 2024</h3>
                        <p style="color: gray" class="text-center ms-2">
                            <i class="bi bi-person-check-fill">Partnered with over <strong>500 reputable companies</strong> actively seeking talented professionals.</i>
                        </p>
                    </div>
            
                    <hr>
                </div>
            
                <div class="row">
                    <img src="{{asset('assets/landingPagePhoto.jpg')}}" class="img-fluid mb-5" alt="Landing Page Image">
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-md-7 mt-3">
                        <h2 class="fw-bold fs-1">How we provides <span style="color: #7869cd">Solutions</span></h2>
                        <p class="mt-3 fw-bold" style="text-align: justify; color: gray; line-height: 1.6;">
                            By providing a space where users can connect with industry professionals, colleagues, and organizations, we foster opportunities for meaningful collaboration and career development. Our platform is deeply committed to addressing key global challenges as outlined in the United Nations’ 17 Sustainable Development Goals (SDGs). 
                        </p>
                        <p class="fw-bold" style="text-align: justify; color: gray; line-height: 1.6;">
                            With a particular focus on eliminating poverty, reducing hunger, promoting decent work, fostering economic growth, and forging impactful partnerships to achieve these goals.
                        </p>                    
                    </div>

                    <div class="col-12 col-md-5 ps-5">
                        <img src="{{asset('assets/sdgs.jpg')}}" class="img-thumbnail" alt="..." width="100%">
                    </div>
                </div>
            </div>
            
        </section>

        <section class="landingPage-2 hidden" id="landingPage-2">
            <div class="container hidden">
                <div class="row">
                    <div class="landing-about-container col-md-12 mt-2 hidden">
                        <h3 class="display-5">Unleash Your Potential with <span>Leading Companies🚀!</span></h3>
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
                        <a class="nav-link active" href="#">Show All Popular Company</a>
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

                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Technology and Information">
                    <img src="{{asset('/assets/gojek.jpeg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Gojek</h5>
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
                    <div class="landing-about-container col-md-12 mt-2 hidden">
                        <h3 class="display-5">Explore Exciting <span>Job Vacancies💼</span></h3>
                        <p class="my-4 lead mt-3 ms-1">🌈 Discover exciting job opportunities tailored just for you – start exploring now!🚀!</p>
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

                <div class="job-vacancy-card card hidden" style="width: 18rem;" data-category="Job Vacancy">
                    <img src="{{asset('/assets/gojek.jpeg')}}" class="card-img-top" alt="...">
                    <div class="popular-job-card-container card-body">
                        <h5 class="card-title">Software Engineer Intern</h5>
                        <p class="card-subtitle text-muted">Gojek</p>
                        <p class="card-text mt-1 mb-0">Jakarta, Indonesia</p>
                        <p class="card-text mt-1">300+ Applicants</p>
                        <a href="#" class="btn btn-outline-primary">More Information</a>
                    </div>
                </div>
                
                <div class="job-vacancy-card card hidden" style="width: 18rem;" data-category="Job Vacancy">
                    <img src="{{asset('/assets/ey.jpeg')}}" class="card-img-top" alt="...">
                    <div class="popular-job-card-container card-body">
                        <h5 class="card-title">Data Analyst Intern</h5>
                        <p class="card-subtitle text-muted">Bukalapak</p>
                        <p class="card-text mt-1 mb-0">Jakarta, Indonesia</p>
                        <p class="card-text mt-1">150+ Applicants</p>
                        <a href="#" class="btn btn-outline-primary">More Information</a>
                    </div>
                </div>
                
                {{-- End of Popular Job Vacancy --}}
            </div>
            <div class="promotion-job-container container hidden">
                <div class="row">
                    <div class="landing-job-bottom-container col-md-12 mt-2 hidden">
                        <h3 class="display-5">Discover Exciting Job Vacancies!</h3>
                        <p class="my-4 lead mt-3 ms-1">Unlock your potential and take the next step in your career by exploring our diverse range of job opportunities. Whether you're aiming for a new role or looking to advance your career, a wealth of positions await you. Don’t miss out on the chance to connect with top employers, showcase your talents, and find a job that aligns with your ambitions and aspirations.
                        </p>    
                    </div>
                </div>
            </div>
        </section>
            
        <section class="landingPage-4 hidden">
            <div class="container hidden">
                <div class="row">
                    <div class="landing-about-container col-md-12 mt-2 text-center">
                        <h3 class="display-5">Hear From Our Users <span>About Their Experience</span></h3>
                        <p class="my-4 lead mt-3 ms-1 text-center">💬 We cherish your opinions! Discover what our users think about their journey with us. Your feedback drives our commitment to excellence!</p>
                    </div>
                </div>
        
                <div class="testimonial-container row hidden">
                    <!-- Testimonial 1 -->
                    <div class="col-md-3 hidden">
                        <div class="testimonial-card">
                            <div class="rating">
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star">★</span>
                            </div>
                            <p class="testimonial-text">"This platform has transformed my job search experience! I found my dream job within weeks!"</p>
                            <h5 class="testimonial-author">— Jane Doe</h5>
                        </div>
                    </div>
                    <!-- Testimonial 2 -->
                    <div class="col-md-3 hidden">
                        <div class="testimonial-card">
                            <div class="rating">
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                            </div>
                            <p class="testimonial-text">"Incredible service and great support! Highly recommend to anyone looking for opportunities."</p>
                            <h5 class="testimonial-author">— John Smith</h5>
                        </div>
                    </div>
                    <!-- Testimonial 3 -->
                    <div class="col-md-3 hidden">
                        <div class="testimonial-card">
                            <div class="rating">
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star">★</span>
                            </div>
                            <p class="testimonial-text">"A user-friendly interface and a wide range of job listings. I couldn’t be happier!"</p>
                            <h5 class="testimonial-author">— Emily Johnson</h5>
                        </div>
                    </div>
                    <!-- Testimonial 4 -->
                    <div class="col-md-3 hidden">
                        <div class="testimonial-card">
                            <div class="rating">
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star">★</span>
                                <span class="star">★</span>
                            </div>
                            <p class="testimonial-text">"The best job portal I've used. Very intuitive and efficient!"</p>
                            <h5 class="testimonial-author">— Mark Thompson</h5>
                        </div>
                    </div>
                    <!-- Testimonial 5 -->
                    <div class="col-md-3 hidden">
                        <div class="testimonial-card">
                            <div class="rating">
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                            </div>
                            <p class="testimonial-text">"Great opportunities and a smooth application process!"</p>
                            <h5 class="testimonial-author">— Sarah Brown</h5>
                        </div>
                    </div>
                    <!-- Testimonial 6 -->
                    <div class="col-md-3 hidden">
                        <div class="testimonial-card">
                            <div class="rating">
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                            </div>
                            <p class="testimonial-text">"I love the personalized job recommendations! They really understand my needs."</p>
                            <h5 class="testimonial-author">— Alice Davis</h5>
                        </div>
                    </div>
                    <!-- Testimonial 7 -->
                    <div class="col-md-3 hidden">
                        <div class="testimonial-card">
                            <div class="rating">
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star">★</span>
                            </div>
                            <p class="testimonial-text">"The platform helped me land a great job with ease. Highly efficient!"</p>
                            <h5 class="testimonial-author">— Daniel Garcia</h5>
                        </div>
                    </div>
                    <!-- Testimonial 8 -->
                    <div class="col-md-3 hidden">
                        <div class="testimonial-card">
                            <div class="rating">
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                            </div>
                            <p class="testimonial-text">"Amazing experience, from job search to interviews. Everything was smooth!"</p>
                            <h5 class="testimonial-author">— Michael Lee</h5>
                        </div>
                    </div>
                    <!-- Testimonial 9 -->
                    <div class="col-md-3 hidden">
                        <div class="testimonial-card">
                            <div class="rating">
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star filled">★</span>
                                <span class="star">★</span>
                            </div>
                            <p class="testimonial-text">"Found my ideal job quickly. Very happy with the service!"</p>
                            <h5 class="testimonial-author">— Olivia Adams</h5>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
    </main>

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

<!-- FontAwesome Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
{{-- Start of Bootstrap 5 --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB30NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
{{-- End of Bootstrap 5 --}}
<script src="{{ asset('js/script.js') }}"></script>
</body>                 
</html>
