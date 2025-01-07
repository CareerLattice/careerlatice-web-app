
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
        .job-image{
                width: 100%;
                height: auto;
        }

        @media(min-width: 344px) and (max-width: 425px){
            .header{
                font-size: 0.7rem;
            }
            .caption{
                font-size: 0.6rem;
            }
            h4{
                font-size: 0.6rem;
            }
            h3{
                font-size: 0.8rem;
            }
            p{
                font-size: 0.4rem;
                white-space: normal;
                word-wrap: break-word;
                overflow: break-word;
            }
            .responsive-btn-text{
               font-size: 0.3rem;
            }

            h5{
                font-size: 1px;
            }

            .job-image{
                width: 100%;
                height: auto;
            }

            .custom-card{
                width: 105px;
                height: auto;
            }

            .content{
                display: flex;
                flex-direction: column;
            }

            .col-xxs-6 {
                flex: 0 0 50%; 
                max-width: 50%;
                gap: 10px;
            }

            .main-custom-card{
                flex: 0 0 45%;
                margin: 1.5% 2%;
                padding: 0.5rem;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            .job-details{
                text-align: left;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                flex-grow: 1; 
            }

            .job-details a {
                width: 100%;  
                font-size: 10px ; 
                padding: 1px; 
            }
            
            .job-details p{
                margin-bottom:5px;
                padding: 0;
            }
            

            .job-details h3{
                font-size: 0.4rem !important;
            }


            .job-details .btn{
                width: 100%;
                text-align: center;
                margin: 0;
                padding: 0;
            }

            .custom-button{
                font-size: 8px !important; 
                width: 40px !important; 
            }

            .body{
                display: flex;
                flex-direction: column;
                justify-content: space-between; 
            }   

            .card-body{
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
@endsection

@section('content')
    @include('components.navbar')

    <section class="" style="background-color:#c0dcf7;">
        <div class="row px-4 py-3 mx-3">
            <div class="col-12 m-3">
                <h2 class="fw-bold text-center text-md-start header" style="color: #682b90">{{__('lang.welcomeCompanyHome')}} {{Auth::user()->name}}!</h2>
                <h5 class="text-center text-md-start fw-bold caption">{{__('lang.captionCompanyHome')}}</h5>
                <div class="row d-md-flex border border-3">
                    <div class="col-md-8 m-auto p-4 text-start mx-0 ">
                        <h4 class="fw-bold ">{{__('lang.totalJobListingCompanyHome')}} <span style="color: #7869cd">{{number_format($data['active_jobs'])}} {{__('lang.activePositionCompanyHome')}}</span></h4>
                        <h4 class="fw-bold ">{{__('lang.totalApplicantsCompanyHome')}} <span style="color: #7869cd">{{number_format($data['total_applicant'])}}</span></h4>
                        <h4 class="fw-bold ">{{__('lang.applicantThisMonthCompanyHome')}} <span style="color: #7869cd">{{number_format($data['month_application'])}}</span></h4>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center justify-content-md-end">
                        <img class="img-fluid" src="{{asset('assets/companyPerformance.png')}}" style="width: 231px">
                    </div>
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
                <div class="col-12 col-md-6 col-xxs-6 text-center d-flex flex-column">
                    <div class="card m-3 p-4 flex-fill">
                        <img class="card-img-top mx-auto mb-3" src="{{asset('assets/newJob.png')}}" style="max-width: 200px">
                        <h2 class="card-title fw-bold caption" style="color: #682b90">{{__('lang.jobListingCompanyHome')}}</h2>
                        <p class="card-text text-muted">{{__('lang.jobListingDescCompanyHome')}}</p>
                        <a href="{{route('company.listJob')}}" class="btn btn-outline-primary mt-auto responsive-btn-text">{{__('lang.createNewJobCompanyHome')}}</a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xxs-6 text-center d-flex flex-column">
                    <div class="card m-3 p-4 flex-fill">
                        <img class="card-img-top mx-auto mb-3" src="{{asset('assets/companyProfileJob.jpg')}}" style="max-width: 200px">
                        <h2 class="card-title fw-bold caption" style="color: #682b90">{{__('lang.companyProfileCompanyHome')}}</h2>
                        <p class="card-text text-muted">{{__('lang.companyProfileDescCompanyHome')}}</p>
                        <a href="{{route('company.profile')}}" class="btn btn-outline-primary mt-auto responsive-btn-text">{{__('lang.editCompanyProfileCompanyHome')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hidden">
    <div class="row px-4 py-3 m-3">
        <div class="col-12">
            <h3 class="fw-bold">{{ __('lang.recentJobCompanyHome') }}</h3>
            <div class="row d-flex flex-wrap">
                @forelse ($data['recent_job'] as $job)
                    <div class="main-custom-card card shadow my-3">
                        <div class="card-body p-md-4 d-flex flex-column flex-md-row body gap-2">
                            <div class="job-image-wrapper">
                                <img src="{{asset('assets/joblistImagePlaceHolder.jpeg')}}" alt="jobPlaceHolder" class="job-image">
                            </div>
                            <div class="job-details" style="width: 70%;">
                                <div class="btn btn-sm btn-outline-danger rounded-pill mb-2 custom-button" style="pointer-events:none">
                                    @if ($job->is_active == true)
                                        {{ __('lang.openCompanyHome') }}
                                    @else
                                        {{ __('lang.closedCompanyHome') }}
                                    @endif
                                </div>
                                <h3 class="card-title fw-bold text-start" style="color: #682b90;">
                                    {{ $job->title }}
                                </h3>
                                <p class="text-muted text-truncate">{{ $job->description }}</p>
                                <p><strong>{{ __('lang.totalApplicantCompanyHome') }}</strong> {{ $job->applicants->count() }}</p>
                                <a href="{{ route('company.job', ['job' => $job]) }}" class="btn btn-primary mb-0">
                                    {{ __('lang.seeDetailCompanyHome') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger">
                        {{ __('lang.noJobListingCompanyHome') }}
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
