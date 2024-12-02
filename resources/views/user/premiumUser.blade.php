@extends('layouts.app')

@section('title', 'Premium')

@section('custom_css')
    <style>
        .testimonial-card {
            background: linear-gradient(135deg, rgba(120, 105, 205, 0.2), rgba(120, 105, 205, 0.4));
            border-radius: 12px;
            padding: 30px;
            margin: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            height: 100%;
        }

        .testimonial-card:hover {
            transform: scale(1.05);
        }

        .testimonial-content {
            max-width: 500px;
        }

        .testimonial-text {
            font-size: 1.1rem;
            color: #555;
            font-style: italic;
            line-height: 1.6;
        }

        .testimonial-author {
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 15px;
            color: #192A51;
        }

        .carousel-inner {
            max-width: 900px;
            margin: 0 auto;
        }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: black;
        }
    </style>
@endsection

@section('content')
    @include('components.navbar')

    <div class="container py-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold mb-4" style="font-size: 2.5rem; color: #192A51; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                Achieve More with <span style="color: #7869cd; font-weight: 700;">Premium</span>
            </h1>

            <p class="text-muted mb-0" style="font-size: 1.2rem; line-height: 1.8; font-family: 'Arial', sans-serif;">
                Sign up today to become an exclusive creator and gain access to unique
            </p>
            <p class="text-muted mb-4" style="font-size: 1.2rem; line-height: 1.8; font-family: 'Arial', sans-serif;">
                perks and features designed just for you.
            </p>
        </div>

        <div class="row justify-content-center">
            <!-- Easy Job Search -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-lg border-0 rounded-3 hover-shadow" style="height: 100%;">
                    <div class="card-body text-center">
                        <i class="bi bi-briefcase-fill" style="font-size: 3rem; color: #7869cd;"></i>
                        <h5 class="card-title mt-3" style="font-size: 1.5rem; color: #192A51; font-weight: 600;">Easy Job Search</h5>
                        <p class="card-text text-muted" style="font-size: 1.1rem; color: #6c757d;">
                            Get personalized job offers directly on your homepage, making it easier to find the right opportunities.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Priority Application -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-lg border-0 rounded-3 hover-shadow" style="height: 100%;">
                    <div class="card-body text-center">
                        <i class="bi bi-check-circle-fill" style="font-size: 3rem; color: #7869cd;"></i>
                        <h5 class="card-title mt-3" style="font-size: 1.5rem; color: #192A51; font-weight: 600;">Priority Application</h5>
                        <p class="card-text text-muted" style="font-size: 1.1rem; color: #6c757d;">
                            Your application will be prioritized by employers, increasing your chances of getting noticed.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Enhanced Profile Visibility -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-lg border-0 rounded-3 hover-shadow" style="height: 100%;">
                    <div class="card-body text-center">
                        <i class="bi bi-eye-fill" style="font-size: 3rem; color: #7869cd;"></i>
                        <h5 class="card-title mt-3" style="font-size: 1.5rem; color: #192A51; font-weight: 600;">Enhanced Profile Visibility</h5>
                        <p class="card-text text-muted" style="font-size: 1.1rem; color: #6c757d;">
                            Your profile will be viewed more frequently by companies, helping you gain more job opportunities.
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <hr>

        <div class="container mt-2 mb-5">
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-6 text-center">
                    <img src="{{asset('assets/premium.jpg')}}" class="img-fluid rounded shadow-sm mt-4" alt="Career Growth" style="width: 100%; height: auto;">
                </div>

                <div class="col-md-12 col-lg-6 mt-2">
                    <h2 class="fw-bold fs-1 mb-4">
                        Take Your Career to the <span style="color: #7869cd">Next Level</span>
                    </h2>
                    <p class="mt-3 fw-semibold" style="text-align: justify; color: #555; line-height: 1.8;">
                        With a Career Lattice Premium subscription, you'll unlock unparalleled opportunities to stand out, gain enhanced visibility, and connect directly with top industry professionals who are actively seeking talent.
                    </p>
                    <p class="fw-semibold" style="text-align: justify; color: #555; line-height: 1.8;">
                        Fast-track your career progression with a profile that attracts attention from leading employers, setting you on a path to success.
                    </p>
                    <form action="{{route('user.upgradeToPremium')}}" method="post">
                        @csrf
                        <input type="hidden" name="duration" value="1">
                        <button class="btn btn-lg rounded-pill px-5 py-3" style="background: #7869cd; color: white; font-weight: 700; font-size: 1.2rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                            Subscribe Today
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <hr>

        <div class="container py-5">
            <div class="mb-4">
                <h2 class="fw-bold mb-4 text-center" style="font-size: 2.5rem; color: #192A51;">
                    Premium Members Unlock More <span style="color: #7869cd; font-weight: 700;">Opportunities</span>!
                </h2>
                <p class="text-center text-muted mb-2" style="font-size: 1.2rem; line-height: 1.8; font-family: 'Arial', sans-serif;">
                    Did you know that becoming a Premium member not only gives you access to exclusive features, but also increases your chances of receiving job offers and career opportunities? Invest in your future and watch the opportunities pour in!
                </p>

                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="testimonial-card d-flex justify-content-center align-items-center">
                                <div class="testimonial-content text-center">
                                    <p class="testimonial-text" style="font-size: 1.2rem; color: #555; font-style: italic;">
                                        "This platform completely transformed my job search! I landed my dream job in just a few weeks!"
                                    </p>
                                    <h5 class="testimonial-author" style="color: #192A51; font-weight: 600;">— Jane Doe</h5>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="testimonial-card d-flex justify-content-center align-items-center">
                                <div class="testimonial-content text-center">
                                    <p class="testimonial-text" style="font-size: 1.2rem; color: #555; font-style: italic;">
                                        "Amazing service with fantastic support! I highly recommend it to anyone seeking opportunities."
                                    </p>
                                    <h5 class="testimonial-author" style="color: #192A51; font-weight: 600;">— John Smith</h5>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="testimonial-card d-flex justify-content-center align-items-center">
                                <div class="testimonial-content text-center">
                                    <p class="testimonial-text" style="font-size: 1.2rem; color: #555; font-style: italic;">
                                        "A seamless user experience and a vast array of job listings. Couldn't be happier!"
                                    </p>
                                    <h5 class="testimonial-author" style="color: #192A51; font-weight: 600;">— Emily Johnson</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <hr>
    </div>

    @include('components.footer')
@endsection
