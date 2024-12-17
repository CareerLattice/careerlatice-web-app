@extends('layouts.app')

@section('title', 'Career Lattice')

@section('custom_css')
        <style>
            * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background-color: #f8f9fa;
            color: #333;
        }

        .hidden {
            opacity: 0;
            transition: all 1.5s;
        }

        .show {
            opacity: 1;
            transition: all 1.5s;
        }

        /* Landing Page Content */
        .landing-about-container {
            padding-top: 2rem;
        }

        .landing-about-container h3 {
            font-size: 2.4rem;
            font-weight: 700;
            color: #682b90;
        }

        .landing-about-container h3 span {
            color: #7869cd;
        }

        .landing-about-container p {
            font-size: 1.1rem;
            text-align: justify;
            margin-top: 1rem;
        }

        .landingPage-btn .btn {
            font-weight: 500;
            padding: 0.8rem 1.5rem;
            margin-top: 1.5rem;
            margin-right: 1rem;
        }

        .offer {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }
        .offer ul {
            display: flex;
            justify-content: space-evenly;
            list-style-type: none;
        }

        .offer li {
            font-size: 1rem;
            color: #333;
        }

        .offer:hover {
            background-color: #e9ecef;
        }

        .offer ul {
            padding: 0;
            margin: 0;
        }

        .offer-item {
            font-size: 1.1rem;
            color: #333;
            margin: 10px 0;
            display: flex;
            align-items: center;
        }

        .offer-item::before {
            content: "• ";
            color: #007bff;
            font-weight: bold;
            margin-right: 8px;
        }

        .promotion {
            padding-top: 50px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            margin: 0 auto;
        }

        .card-body h5 {
            font-size: 1.4rem;
            font-weight: bolder;
            color: #682b90;
            text-align: center;
        }

        .card-body p {
            text-align: center;
            font-size: 1.1rem;
        }

        .carousel-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .carousel-caption {
            text-align: center;
            color: #ffffff;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
        }

        .carousel-caption h5 {
            font-size: 2.2rem;
            font-weight: bold;
        }

        .carousel-caption p {
            font-size: 1.4rem;
            line-height: 1.5;
        }

        /* End of Landing Page 1 */

        /* Start of Landing Page 2 */
        .landingPage-2 {
            background-color: #c0dcf7;
            padding: 50px 0;
        }

        .landing-company-container {
            padding-top: 50px;
            text-align: center;
        }

        .navbar-company-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .navbar-company .nav-link {
            font-size: 1rem;
            color: #555;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 20px;
            padding-bottom: 20px;
            transition: color 0.3s ease;
        }

        .navbar-company .nav-link:hover {
            color: blue;
            font-weight: bold;
        }

        .navbar-company .nav-link.active {
            color: blue;
            font-weight: bold;
        }

        .popular-company {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(18rem, 1fr));
            gap: 20px;
        }

        .popular-company-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #fff;
            margin-bottom: 10px;
        }

        .popular-company-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .popular-company-card img {
            width: 100%;
            height: 12rem;
            object-fit: cover;
            border-bottom: 3px solid #682b90;
        }

        .popular-company-card .card-body {
            padding: 15px;
            text-align: center;
        }

        .popular-company-card h5 {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .popular-company-card p {
            font-size: 0.95rem;
            color: #666;
            margin-bottom: 20px;
        }

        .company-container {
            border-radius: 13px;
            color: rgb(105, 105, 255);
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 5px;
        }

        .landing-company-bottom-container {
            background-color: rgb(255, 203, 203);
            padding-top: 50px;
            padding-top: 30px;
            padding-left: 100px;
            padding-right: 100px;
        }

        .promotion-company-container {
            padding-top: 30px;
            padding-bottom: 30px;
            padding-left: 50px;
            padding-right: 50px;
            text-align: center;
        }
        /* landing-company-bottom-container */

        .landing-company-bottom-container h3 {
            font-size: 2rem;
            text-align: left;
            color: #682b90;
            font-weight: bold;
        }

        .landing-company-bottom-container p {
            font-size: 1rem;
            text-align: justify;
            color: black;
            font-weight: 400;
        }

        .promotion .card {
            border: none;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .promotion .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .promotion .card-body i {
            color: #555;
        }

        .promotion .card-body h5 {
            font-size: 1.25rem;
            color: #333;
        }

        .promotion .card-body p {
            font-size: 1rem;
            color: #666;
        }

        /* End of Landing Page 2 */

        /* Start of Landing Page 3 */
        .landingPage-3 {
            background-color: #f8f9fa;
            padding: 50px 0;
        }

        .landing-vacancy-container {
            padding-top: 50px;
            text-align: center;
        }

        .job-vacancy-card img {
            width: 100%;
            height: 12rem;
            object-fit: cover;
        }

        .job-vacancy-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 8px;
            overflow: hidden;
        }

        .job-vacancy {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(18rem, 1fr));
            gap: 15px;
        }

        .job-vacancy-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-bottom: 2px solid #007bff;
        }

        .popular-job-card-container {
            padding: 15px;
            text-align: center;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
        }

        .card-subtitle {
            font-size: 1rem;
            color: #777;
        }

        .card-text {
            font-size: 0.9rem;
            color: #555;
        }

        .popular-job-card-container h5 {
            font-size: 1.1rem;
            text-align: left;
        }

        .popular-job-card-container p {
            font-size: 1rem;
            text-align: left;
            color: grey;
        }

        .promotion-job-container {
            padding-top: 30px;
            padding-bottom: 30px;
            padding-left: 50px;
            padding-right: 50px;
            text-align: center;
        }

        .landing-job-bottom-container h3 {
            font-size: 2rem;
            text-align: left;
            color: #008080;
            font-weight: bold;
        }

        .landing-job-bottom-container p {
            font-size: 1rem;
            text-align: justify;
            color: #4a4a4a;
            font-weight: 400;
        }

        .landing-job-bottom-container {
            background-color: #e0f7fa;
            padding-top: 50px;
            padding-top: 30px;
            padding-left: 100px;
            padding-right: 100px;
        }
        /* End of Landing Page 3 */

        /* Start of Landing Page 4 */
        .landingPage-4 {
            background-color: #c0dcf7;
            padding: 50px 0;
        }

        .testimonial-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .testimonial-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.2s;
        }

        .testimonial-card:hover {
            transform: scale(1.05);
        }

        .testimonial-text {
            font-size: 1rem;
            text-align: center;
            color: #fff;
            margin-bottom: 15px;
        }

        .testimonial-author {
            font-size: 1rem;
            color: #fff;
            font-weight: bold;
        }

        .rating {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .star {
            font-size: 20px;
            color: #ccc;
        }

        .star.filled {
            color: #ffd700;
        }

        .testimonial-card {
            background-image: linear-gradient(to right, #682b90, #7869cd);
        }
        .popular-company-card {
            display: flex;
            flex-direction: column;
            height: 100%; 
        }

        .card-body {
            flex-grow: 1; 
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .btn {
            margin-top: auto; 
        }


        @media (max-width: 768px) {
            .job-vacancy {
                flex-direction: column;
                align-items: center;
            }

            .img {
                width: 30%;
                height: 30%;
            }
        }

        @media (max-width: 425px) {
            .img {
                width: 50%;
                height: 50%;
            }
        }

        @media (max-width: 320px) {
            .img {
                width: 50%;
                height: 50%;
            }
        }

        @media (max-width: 344px) {
            .landing-company-bottom-container {
                padding: 12px;
                text-align: center; 
            }

            .landing-company-bottom-container h3 {
                font-size: 13px;
                line-height: 1; 
                margin-bottom: 10px;
                text-align: center;
            }

            .landing-company-bottom-container p {
                font-size: 12px; 
            }
            
            .landing-job-bottom-container{
                padding: 10px;
            }
            .landing-job-bottom-container h3{
                text-align: center;
                line-height: 1;
                font-size: 20px;
            }
            .landing-job-bottom-container p{
                font-size: 10px;
            }

        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600&display=swap" rel="stylesheet">
@endsection

@section('content')
    @include('components.navbar')
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
                <div class="col-12 col-md-7">
                    <h2 class="fw-bold fs-1 mt-5">A Quick Look at <span style="color: #7869cd">Our Journey</span></h2>
                    <p class="mt-3 fw-bold" style="text-align: justify; color: gray">
                        CareerLattice is an innovative platform dedicated to empowering individuals by helping them advance their careers and build strong professional networks.
                    </p>
                </div>

                <div id="customCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <h3 class="fw-bold text-center" style="color: #682b90">Jan 2024</h3>
                                    <p class="text-center" style="color: gray">
                                        Launched our platform with <strong>over 100 active users</strong> joining in the first month.
                                    </p>
                                </div>
                                <div class="col-12 col-md-4">
                                    <h3 class="fw-bold text-center" style="color: #682b90">Apr 2024</h3>
                                    <p class="text-center" style="color: gray">
                                        Gained momentum, reaching <strong>300+ active users</strong> and improving user engagement.
                                    </p>
                                </div>
                                <div class="col-12 col-md-4">
                                    <h3 class="fw-bold text-center" style="color: #682b90">Jul 2024</h3>
                                    <p class="text-center" style="color: gray">
                                        Secured partnerships with <strong>50+ companies</strong> actively hiring talent from our platform.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <h3 class="fw-bold text-center" style="color: #682b90">Oct 2024</h3>
                                    <p class="text-center" style="color: gray">
                                        Expanded to <strong>over 500 active users</strong> benefiting from new features and partnerships.
                                    </p>
                                </div>
                                <div class="col-12 col-md-4">
                                    <h3 class="fw-bold text-center" style="color: #682b90">Jan 2025</h3>
                                    <p class="text-center" style="color: gray">
                                        Achieved a milestone of <strong>700+ active users</strong> with enhanced services and support.
                                    </p>
                                </div>
                                <div class="col-12 col-md-4">
                                    <h3 class="fw-bold text-center" style="color: #682b90">Apr 2025</h3>
                                    <p class="text-center" style="color: gray">
                                        Partnered with <strong>100+ companies</strong> and expanded our reach to new regions.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="carousel-control-prev custom-control-btn" type="button" data-bs-target="#customCarousel" data-bs-slide="prev">
                        <span class="custom-control-text">Previous</span>
                    </button>
                    <button class="carousel-control-next custom-control-btn" type="button" data-bs-target="#customCarousel" data-bs-slide="next">
                        <span class="custom-control-text">Next</span>
                    </button>
                </div>



                <div class="row">
                    <img src="{{asset('assets/landingPagePhoto.jpg')}}" class="img-fluid mb-3" alt="Landing Page Image">
                </div>

                <div class="container mb-5">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6 text-center">
                            <img src="{{asset('assets/sdgs.jpg')}}" class="img-fluid rounded shadow-sm mt-4" alt="Career Growth" style="max-width: 100%; height: auto;">
                        </div>
                        <div class="col-12 col-md-6">
                            <h2 class="fw-bold fs-1 mb-4">How we provides <span style="color: #7869cd">Solutions</span></h2>
                            <p class="mt-3 fw-semibold" style="text-align: justify; color: #555; line-height: 1.8;">
                                By providing a space where users can connect with industry professionals, colleagues, and organizations, we foster opportunities for meaningful collaboration and career development. Our platform is deeply committed to addressing key global challenges as outlined in the United Nations’ 17 Sustainable Development Goals (SDGs).
                            </p>
                            <p class="fw-semibold" style="text-align: justify; color: #555; line-height: 1.8;">
                                With a particular focus on eliminating poverty, reducing hunger, promoting decent work, fostering economic growth, and forging impactful partnerships to achieve these goals.
                            </p>
                        </div>
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
                    <img src="{{ asset('/assets/tokopedia.jpeg') }}" class="card-img-top" alt="Tokopedia">
                    <div class="card-body">
                        <h5 class="card-title">Tokopedia</h5>
                        <p class="card-text">Tokopedia is one of the largest online marketplaces in Indonesia, providing a platform for buying and selling goods.</p>
                        <a href="https://www.tokopedia.com" target="_blank" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>
            
                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Technology and Information">
                    <img src="{{ asset('/assets/shopee.jpeg') }}" class="card-img-top" alt="Shopee">
                    <div class="card-body">
                        <h5 class="card-title">Shopee</h5>
                        <p class="card-text">Shopee is an e-commerce platform with various features, including ShopeePay and free shipping offers for users.</p>
                        <a href="https://www.shopee.co.id" target="_blank" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>
            
                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Technology and Information">
                    <img src="{{ asset('/assets/grab.jpeg') }}" class="card-img-top" alt="Grab">
                    <div class="card-body">
                        <h5 class="card-title">Grab</h5>
                        <p class="card-text">Grab is a leading ride-hailing service in Southeast Asia, also providing food delivery and payment services.</p>
                        <a href="https://www.grab.com" target="_blank" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>
            
                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Technology and Information">
                    <img src="{{ asset('/assets/traveloka.jpeg') }}" class="card-img-top" alt="Traveloka">
                    <div class="card-body">
                        <h5 class="card-title">Traveloka</h5>
                        <p class="card-text">Traveloka is a leading online travel agent in Southeast Asia, providing flight and hotel booking services.</p>
                        <a href="https://www.traveloka.com" target="_blank" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>
            
                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Technology and Information">
                    <img src="{{ asset('/assets/blibli.jpeg') }}" class="card-img-top" alt="Blibli">
                    <div class="card-body">
                        <h5 class="card-title">Blibli</h5>
                        <p class="card-text">Blibli is an Indonesian e-commerce platform, offering a wide range of products, from electronics to groceries.</p>
                        <a href="https://www.blibli.com" target="_blank" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>
            
                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Technology and Information">
                    <img src="{{ asset('/assets/gojek.jpeg') }}" class="card-img-top" alt="Gojek">
                    <div class="card-body">
                        <h5 class="card-title">Gojek</h5>
                        <p class="card-text">Gojek is an on-demand multi-service platform, offering services from transportation to food delivery in Southeast Asia.</p>
                        <a href="https://www.gojek.com" target="_blank" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>
                {{-- End of Technology and Information category --}}
            
                {{-- Start of Consulting and Accounting category --}}
                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Consulting and Accounting">
                    <img src="{{ asset('/assets/deloitte.jpeg') }}" class="card-img-top" alt="Deloitte">
                    <div class="card-body">
                        <h5 class="card-title">Deloitte</h5>
                        <p class="card-text">Deloitte is a global consulting firm offering services in audit, tax, consulting, and financial advisory.</p>
                        <a href="https://www.deloitte.com" target="_blank" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>
            
                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Consulting and Accounting">
                    <img src="{{ asset('/assets/kpmg.jpeg') }}" class="card-img-top" alt="KPMG">
                    <div class="card-body">
                        <h5 class="card-title">KPMG</h5>
                        <p class="card-text">KPMG is a global leader in audit, tax, and advisory services, helping clients manage risks and improve business performance.</p>
                        <a href="https://home.kpmg" target="_blank" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>
            
                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Consulting and Accounting">
                    <img src="{{ asset('/assets/ey.jpeg') }}" class="card-img-top" alt="EY">
                    <div class="card-body">
                        <h5 class="card-title">EY</h5>
                        <p class="card-text">EY (Ernst & Young) is a global leader in assurance, tax, transaction, and advisory services.</p>
                        <a href="https://www.ey.com" target="_blank" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>
            
                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Consulting and Accounting">
                    <img src="{{ asset('/assets/pwc.jpeg') }}" class="card-img-top" alt="PwC">
                    <div class="card-body">
                        <h5 class="card-title">PwC</h5>
                        <p class="card-text">PwC is a global professional services network providing audit, tax, and consulting services.</p>
                        <a href="https://www.pwc.com" target="_blank" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>
                {{-- End of Consulting and Accounting category --}}
            
                {{-- Start of Finance and Insurance category --}}
                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Finance and Insurance">
                    <img src="{{ asset('/assets/bbca.jpeg') }}" class="card-img-top" alt="Bank Central Asia">
                    <div class="card-body">
                        <h5 class="card-title">Bank Central Asia</h5>
                        <p class="card-text">Bank Central Asia (BCA) is one of Indonesia's leading banks, providing banking and financial services across the country.</p>
                        <a href="https://www.bca.co.id" target="_blank" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>
                {{-- End of Finance and Insurance category --}}
            
                {{-- Start of Healthcare and Hospitality --}}
                <div class="popular-company-card card hidden" style="width: 18rem;" data-category="Healthcare and Hospitality">
                    <img src="{{ asset('/assets/omnihospital.jpeg') }}" class="card-img-top" alt="Omni Hospital">
                    <div class="card-body">
                        <h5 class="card-title">Omni Hospital</h5>
                        <p class="card-text">Omni Hospital is a healthcare provider offering a wide range of medical services with top-tier healthcare professionals.</p>
                        <a href="https://www.omnihospital.com" target="_blank" class="btn btn-outline-primary">Visit Company</a>
                    </div>
                </div>
                {{-- End of Healthcare and Hospitality category --}}
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
                        <a href="https://karir.bca.co.id/" class="btn btn-outline-primary" target="_blank">More Information</a>
                    </div>
                </div>
            
                <div class="job-vacancy-card card hidden" style="width: 18rem;" data-category="Job Vacancy">
                    <img src="{{asset('/assets/grab.jpeg')}}" class="card-img-top" alt="...">
                    <div class="popular-job-card-container card-body">
                        <h5 class="card-title">UI/UX Designer</h5>
                        <p class="card-subtitle text-muted">Grab</p>
                        <p class="card-text mt-1 mb-0">Jakarta, Indonesia</p>
                        <p class="card-text mt-1">200+ Applicants</p>
                        <a href="https://grab.careers" class="btn btn-outline-primary" target="_blank">More Information</a>
                    </div>
                </div>
            
                <div class="job-vacancy-card card hidden" style="width: 18rem;" data-category="Job Vacancy">
                    <img src="{{asset('/assets/deloitte.jpeg')}}" class="card-img-top" alt="...">
                    <div class="popular-job-card-container card-body">
                        <h5 class="card-title">Project Manager</h5>
                        <p class="card-subtitle text-muted">Deloitte.</p>
                        <p class="card-text mt-1 mb-0">Jakarta, Indonesia</p>
                        <p class="card-text mt-1">300+ Applicants</p>
                        <a href="https://www2.deloitte.com/global/en/careers" class="btn btn-outline-primary" target="_blank">More Information</a>
                    </div>
                </div>
            
                <div class="job-vacancy-card card hidden" style="width: 18rem;" data-category="Job Vacancy">
                    <img src="{{asset('/assets/shopee.jpeg')}}" class="card-img-top" alt="...">
                    <div class="popular-job-card-container card-body">
                        <h5 class="card-title">Mobile App Developer</h5>
                        <p class="card-subtitle text-muted">Shopee</p>
                        <p class="card-text mt-1 mb-0">Jakarta, Indonesia</p>
                        <p class="card-text mt-1">150+ Applicants</p>
                        <a href="https://careers.shopee.com" class="btn btn-outline-primary" target="_blank">More Information</a>
                    </div>
                </div>
            
                <div class="job-vacancy-card card hidden" style="width: 18rem;" data-category="Job Vacancy">
                    <img src="{{asset('/assets/pwc.jpeg')}}" class="card-img-top" alt="...">
                    <div class="popular-job-card-container card-body">
                        <h5 class="card-title">System Administrator</h5>
                        <p class="card-subtitle text-muted">PwC</p>
                        <p class="card-text mt-1 mb-0">Jakarta, Indonesia</p>
                        <p class="card-text mt-1">50+ Applicants</p>
                        <a href="https://www.pwc.com/id/en/careers.html" class="btn btn-outline-primary" target="_blank">More Information</a>
                    </div>
                </div>
            
                <div class="job-vacancy-card card hidden" style="width: 18rem;" data-category="Job Vacancy">
                    <img src="{{asset('/assets/tokopedia.jpeg')}}" class="card-img-top" alt="...">
                    <div class="popular-job-card-container card-body">
                        <h5 class="card-title">Tech Intern</h5>
                        <p class="card-subtitle text-muted">Tokopedia</p>
                        <p class="card-text mt-1 mb-0">Jakarta, Indonesia</p>
                        <p class="card-text mt-1">500+ Applicants</p>
                        <a href="https://www.tokopedia.com/careers" class="btn btn-outline-primary" target="_blank">More Information</a>
                    </div>
                </div>
            
                <div class="job-vacancy-card card hidden" style="width: 18rem;" data-category="Job Vacancy">
                    <img src="{{asset('/assets/gojek.jpeg')}}" class="card-img-top" alt="...">
                    <div class="popular-job-card-container card-body">
                        <h5 class="card-title">Software Engineer Intern</h5>
                        <p class="card-subtitle text-muted">Gojek</p>
                        <p class="card-text mt-1 mb-0">Jakarta, Indonesia</p>
                        <p class="card-text mt-1">300+ Applicants</p>
                        <a href="https://www.gotocompany.com/careers" class="btn btn-outline-primary" target="_blank">More Information</a>
                    </div>
                </div>
            
                <div class="job-vacancy-card card hidden" style="width: 18rem;" data-category="Job Vacancy">
                    <img src="{{asset('/assets/ey.jpeg')}}" class="card-img-top" alt="...">
                    <div class="popular-job-card-container card-body">
                        <h5 class="card-title">Data Analyst Intern</h5>
                        <p class="card-subtitle text-muted">Bukalapak</p>
                        <p class="card-text mt-1 mb-0">Jakarta, Indonesia</p>
                        <p class="card-text mt-1">150+ Applicants</p>
                        <a href="https://career.bukalapak.com" class="btn btn-outline-primary" target="_blank">More Information</a>
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

    @include('components.footer')
@endsection

@section('custom_script')
    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                } else {
                    entry.target.classList.remove("show");
                }
            });
        });

        const hiddenElements = document.querySelectorAll(".hidden");
        hiddenElements.forEach((element) => {
            observer.observe(element);
        });

        document.addEventListener("DOMContentLoaded", function () {
            const filterLinks = document.querySelectorAll(".navbar-company .nav-link");
            const cards = document.querySelectorAll(".popular-company .card");

            filterLinks.forEach((link) => {
                link.addEventListener("click", function (e) {
                    e.preventDefault();

                    filterLinks.forEach((item) => {
                        item.classList.remove("active");
                    });

                    link.classList.add("active");

                    const category = link.textContent.trim();
                    console.log(`Filtering for category: ${category}`);

                    cards.forEach((card) => {
                        const cardCategory = card.getAttribute("data-category");

                        if (
                            category === cardCategory ||
                            category === "Show All Popular Company"
                        ) {
                            card.style.display = "block";
                        } else {
                            card.style.display = "none";
                        }
                    });
                });
            });
        });
    </script>
@endsection
