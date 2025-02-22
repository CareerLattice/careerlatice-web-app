@extends('layouts.app')

@section('title', $company->user->name)

<style>
/* Default styling for custom-card */
.custom-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: auto;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Default styling for custom-card-body */
.custom-card-body {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 1rem;
}

/* Default styling for custom-card-title */
.custom-card-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

/* Default styling for custom-card-text */
.custom-card-text {
    color: #555;
    margin-bottom: 1rem;
    max-height: 48px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* Default styling for custom-btn */
.custom-btn {
    background-color: #0056b3;
    border-color: #0056b3;
    font-size: 0.9rem;
    font-weight: 500;
    margin-top: auto;
    transition: background-color 0.3s ease;
}

/* Responsive styling for screen width <= 722px */
@media (max-width: 767px) {
    .responsive-card {
        height: 200px; /* Set fixed height */
        min-height: 200px; /* Ensure minimum height consistency */
    }

    .custom-card-text {
        max-height: none; /* Remove max-height for more flexible text wrapping */
        white-space: normal; /* Allow text to wrap on small screens */
    }

    .custom-btn {
        width: 100%; /* Make the button full width on small screens */
        text-align: center;
    }
}
</style>


@section('content')
    @include('components.navbar')

    <div class="position-relative">
        <img src="{{asset('assets/bannerCompany.jpg')}}"
             alt="Company Cover"
             class="img-fluid w-100"
             style="object-fit: cover; height: 35vh; max-height: 500px;">

        <div class="banner position-absolute top-50 start-50 translate-middle text-center text-white px-3">
            <h2 class="fw-bold text-wrap">{{__('lang.welcome')}} {{$company->user->name}}</h2>
            <p class="lead text-wrap fw-bold" style="color: gold; font-size: 1.5rem;">{{__('lang.trusted')}}</p>
        </div>
    </div>

    <div class="container mt-4">
        <a href="{{route('companies')}}" class="text-primary text-decoration-none mb-4 d-inline-block">
            <i class="bi bi-arrow-left-circle"></i> {{__('lang.back')}}
        </a>
    </div>

    <div class="container">
        <div class="card" style="border: 1px solid #ddd; border-radius: 8px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
            <div class="card-body">
                <div class="d-flex align-items-center mb-4">
                    <div class="row">
                        <div class="col-12 col-md-3 ms-4 mb-2 d-flex justify-content-center">
                            @php
                                $contents = collect(Storage::disk('google')->listContents('/', true));
                            @endphp

                            @if ($company->user->profile_picture != null && Storage::disk('google')->exists($company->user->profile_picture))
                                @php
                                    $file = $contents->firstWhere('path', $company->user->profile_picture);
                                    $photo_url = $file ? "https://drive.google.com/thumbnail?id={$file['extraMetadata']['id']}" : asset('assets/default_profile_picture.jpg');
                                @endphp
                                <img src="{{$photo_url}}" alt="Company Logo" class="rounded-circle" style="width: 150px; height: 150px;">
                            @else
                                <img src="{{asset('assets/default_profile_picture.jpg')}}" alt="Company Logo" class="rounded-circle" style="width: 150px; height: 150px;">
                            @endif
                        </div>

                        <div class="col-12 col-md-8 ps-4 ms-2">
                            <h3 class="card-title mb-0 mt-2" style="font-weight: 500;">{{$company->user->name}}</h3>
                            <p class="text-muted mt-2">{{$company->address}}</p>
                        </div>
                    </div>
                </div>

                <ul class="nav nav-tabs mb-4" id="companyTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active fw-bold" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab" style="font-size: 1.2rem;">{{__('lang.companyInfo')}}</button>
                    </li>
                </ul>

                <div class="tab-content" id="companyTabContent">
                    <h4 class="section-title" style="font-size: 1.4rem; font-weight: bold; margin-bottom: 1rem; color: #0056b3; text-align: justify;">{{__('lang.description')}}</h4>
                    <p>{{$company->description}}</p>
                </div>

            </div>
        </div>

        <div class="card mt-3" style="border: 1px solid #ddd; border-radius: 8px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
            <div class="card-body">
                <ul class="nav nav-tabs mb-4" id="companyTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active fw-bold" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab" style="font-size: 1.2rem;">{{__('lang.Job Vacancies')}}</button>
                    </li>
                </ul>

                <div class="tab-content" id="companyTabContent">
                    <h4 class="section-title" style="font-size: 1.4rem; font-weight: bold; margin-bottom: 1rem; color: #0056b3;">{{__('lang.discoverExciting')}}</h4>
                    <p class="mb-4" style="color: #555;">
                    {{__('lang.jobVacanciesInvite')}}
                        </p>
                    <div class="row">
                        @forelse ($jobs as $job)
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <div class="custom-card card responsive-card" style="border: 1px solid #ddd; border-radius: 8px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                                <div class="custom-card-body card-body cards">
                                    <h5 class="custom-card-title card-title" style="font-weight: 500; font-size: 0.8 rem;">{{$job->title}}</h5>
                                    <p class="custom-card-text card-text text-truncate" style="color: #555; margin-bottom: 1rem; max-height: 48px; overflow: hidden;">
                                        {{$job->description}}
                                    </p>
                                    <a href="{{route('user.jobDetail', ['job' => $job])}}" class="custom-btn btn btn-primary" style="background-color: #0056b3; border-color: #0056b3; font-size: 0.9rem; font-weight: 500; transition: background-color 0.3s ease;">{{__('lang.apply')}}</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-danger">
                                {{__('lang.noJob')}}
                            </div>
                        @endforelse
                        <div class="d-flex flex-md-row justify-content-center gap-2 mt-4 mb-3" style="width: 100%;">
                            <a href="{{route('user.companyJobVacancies', ['company' => $company])}}" class="btn btn-dark" style="background-color: #333; font-size: 1rem; padding: 8px 18px;">{{__('lang.viewAll')}}</a>
                        </div>
                    </div>
                </div>

                <hr class="my-4">
            </div>
        </div>

        <div class="card mt-3 shadow">
            <div class="card-body">
                <ul class="nav nav-tabs mb-4" id="companyTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active fw-bold" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab" style="font-size: 1.2rem;">{{__('lang.Contact Us')}}</button>
                    </li>
                </ul>

                <div class="tab-content" id="companyTabContent">
                    <h5 class="section-title" style="font-size: 1.2rem; font-weight: bold; margin-bottom: 1rem; color: #0056b3;">{{__('lang.get')}} {{$company->user->name}}</h5>
                    <p class="mb-4" style="color: #555; font-size: 1rem;">{{__('lang.feedback')}}</p>

                    <div class="row mb-4">
                        <div class="col-md-4 d-flex align-items-start">
                            <i class="bi bi-envelope-fill text-primary me-3" style="font-size: 2rem;"></i>
                            <div>
                                <h6 class="fw-bold mb-1">{{__('lang.email')}}</h6>
                                <a href="mailto:bbca-career@bca.co.id" class="text-decoration-none text-dark">{{$company->user->email}}</a>
                            </div>
                        </div>

                        <div class="col-md-4 d-flex align-items-start mt-2">
                            <i class="bi bi-telephone-fill text-success me-3" style="font-size: 2rem;"></i>
                            <div>
                                <h6 class="fw-bold mb-1">{{__('lang.phoneNumber')}}</h6>
                                <p class="mb-0">{{$company->user->phone_number}}</p>
                            </div>
                        </div>

                        <div class="col-md-4 d-flex align-items-start mt-2">
                            <i class="bi bi-geo-alt-fill text-danger me-3" style="font-size: 2rem;"></i>
                            <div>
                                <h6 class="fw-bold mb-1">{{__('lang.address')}}</h6>
                                <p class="mb-0">{{$company->address}}</p>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">
                    <h5 class="fw-bold text-center">{{__('lang.follow')}} <span style="color: #0056b3;">{{$company->user->name}}</span> {{__('lang.socialMed')}}</h5>

                    <div class="d-flex justify-content-center" style="gap: 20px;">
                        <a href="https://www.facebook.com/" class="text-dark">
                            <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                        </a>
                        <a href="https://x.com/" class="text-dark">
                            <i class="bi bi-twitter" style="font-size: 1.5rem;"></i>
                        </a>
                        <a href="https://id.linkedin.com/" class="text-dark">
                            <i class="bi bi-linkedin" style="font-size: 1.5rem;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="mt-5">

    @include('components.footer')
@endsection
