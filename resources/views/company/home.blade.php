
@extends('layouts.app')

@section('title', 'Company Home')

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

        .navbar {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .logo-right {
            color: darkblue;
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

        .carousel-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            object-position: center center;
        }

        .text-outline {
            color: transparent;
            text-shadow: 0 0 2px #ffffff;
        }
    </style>
@endsection

@section('content')
    @include('components.navbar')

    <section class="" style="background-color: #c0dcf7;">
        <div class="container py-4">
            <div class="text-center text-md-start mb-4">
                <h2 class="fw-bold" style="color: #682b90;">
                    {{ __('lang.welcomeCompanyHome') }} {{ Auth::user()->name }}!
                </h2>
                <h5 class="fw-bold">{{ __('lang.captionCompanyHome') }}</h5>
            </div>
            <div class="row border border-3 rounded">
                <div class="col-12 col-md-8 p-4 d-flex flex-column justify-content-center">
                    <h4 class="fw-bold mb-3">
                        {{ __('lang.totalJobListingCompanyHome') }}
                        <span style="color: #7869cd;">{{ number_format($data['active_jobs']) }} {{ __('lang.activePositionCompanyHome') }} </span>
                    </h4>
                    <h4 class="fw-bold mb-3">
                        {{ __('lang.totalApplicantsCompanyHome') }}
                        <span style="color: #7869cd;">{{ number_format($data['total_applicant']) }}</span>
                    </h4>
                    <h4 class="fw-bold">
                        {{ __('lang.applicantThisMonthCompanyHome') }}
                        <span style="color: #7869cd;">{{ number_format($data['month_application']) }}</span>
                    </h4>
                </div>
                <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                    <img class="img-fluid" src="{{ asset('assets/companyPerformance.png') }}" alt="Company Performance" style="width: 231px;">
                </div>
            </div>
        </div>
    </section>
    
    


    <section class="hidden">
        <div class="row px-4 py-3 m-3 hidden">
            <div class="col-12">
                <h3 class="fw-bold">{{__('lang.contentTitleCompanyHome')}}</h3>
            </div>
            <div class="d-flex flex-wrap">
                <div class="col-12 col-md-6 text-center d-flex flex-column align-items-center">
                    <div class="card m-3 p-4">
                        <img class="card-img-top mx-auto mb-3" src="{{asset('assets/newJob.png')}}" style="max-width: 200px">
                        <h2 class="card-title fw-bold" style="color: #682b90">{{__('lang.jobListingCompanyHome')}}</h5>
                        <p class="card-text text-muted">{{__('lang.jobListingDescCompanyHome')}}</p>
                        <a href="{{route('company.listJob')}}" class="btn btn-outline-primary m-4">{{__('lang.createNewJobCompanyHome')}}</a>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-center d-flex flex-column align-items-center">
                    <div class="card m-3 p-4">
                        <img class="card-img-top mx-auto mb-3" src="{{asset('assets/companyProfileJob.jpg')}}" style="max-width: 200px">
                        <h2 class="card-title fw-bold" style="color: #682b90">{{__('lang.companyProfileCompanyHome')}}</h5>
                        <p class="card-text text-muted">{{__('lang.companyProfileDescCompanyHome')}}</p>
                        <a href="{{route('company.profile')}}" class="btn btn-outline-primary m-4">{{__('lang.editCompanyProfileCompanyHome')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hidden">
        <div class="row px-4 py-3 m-3 hidden">
            <div class="col-12">
                <h3 class="fw-bold">{{__('lang.recentJobCompanyHome')}}</h3>
                <div class="row">
                    @forelse ($data['recent_job'] as $job)
                        <div class="col-12 my-3 shadow">
                            <div class="m-3 p-md-4 d-flex flex-column flex-md-row align-items-center">
                                <div>
                                    <img class="img-fluid mx-auto p-3 mb-3" alt="image" src="{{asset('assets/joblistImagePlaceHolder.jpeg')}}">
                                </div>

                                <div class="col-12 col-md-8">
                                    <div class="btn btn-sm btn-outline-danger rounded-pill mb-2" style="width: 100px; pointer-events:none;" alt="status job">
                                        @if ($job->is_active == true)
                                            {{ __('lang.openCompanyHome') }}
                                        @else
                                            {{ __('lang.closedCompanyHome') }}
                                        @endif
                                    </div>
                                    <h3 class="card-title fw-bold text-start text-wrap" style="color: #682b90; word-wrap: break-word;">
                                        {{ $job->title }}
                                    </h3>
                                    <div>
                                        <p class="text-muted text-start text-break" style="word-break: break-word;" alt="job description">
                                            {{ $job->description }}
                                        </p>
                                    </div>
                                    <p><strong>{{ __('lang.totalApplicantCompanyHome') }} </strong>{{ $job->applicants->count() }}</p>
                                    <a href="{{ route('company.job', ['job' => $job]) }}" class="btn btn-primary">{{ __('lang.seeDetailCompanyHome') }}</a>                                    
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">
                            {{__('lang.noJobListingCompanyHome')}}
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

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
