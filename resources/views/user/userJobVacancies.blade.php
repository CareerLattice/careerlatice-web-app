@extends('layouts.app')

@section('title', 'Job Vacancies')

<style>
    @media (max-width: 612px) {
        .bannerText {
            font-size: 1.8rem;
        }
        .bannerText h1 {
            font-size: 1.5rem;
        }
        .bannerText p {
            font-size: 1rem;
        }
    }

    @media (min-width: 613px) and (max-width: 992px) {
        .bannerText {
            font-size: 2.2rem;
        }
        .bannerText h1 {
            font-size: 2rem;
        }
        .bannerText p {
            font-size: 1.2rem;
        }
    }

    @media (min-width: 993px) {
        .bannerText {
            font-size: 3rem;
        }
        .bannerText h1 {
            font-size: 2.5rem;
        }
        .bannerText p {
            font-size: 1.5rem;
        }
    }
</style>

@section('content')
    @include('components.navbar')

    <div class="position-relative" style="position: relative;">
        <img src="{{ asset('assets/bannerUserJobVacan.jpg') }}" alt="Job Opportunities Banner" class="img-fluid"
            style="object-fit: cover; width: 100%; height: 35vh; max-height: 450px;">

        <div class="container position-absolute top-50 start-50 translate-middle text-center"
            style="transform: translate(-50%, -50%); color: black;">
            <h1 class="fw-bold" style="font-size: 2rem;">
                Hello, <span style="color: #0d6efd;">Senn</span>! Your Journey Awaits
            </h1>
            <p style="font-size: 1.2rem; color: black;">
                Discover endless possibilities and unlock new opportunities for your bright future!
            </p>
        </div>
    </div>

    <div class="container mt-5">
        <h3 class="container-title mb-4" style="font-size: 1.8rem; color: #192A51; font-weight: 700;">
            Current Active <span style="color: #682b90">Job Applications</span>
        </h3>
        <div class="row">
            @forelse ($userJobApplications as $jobVacancy)
                <div class="col-sm-12 col-md-6 mb-4">
                    <div class="card job-card" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 8px;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold mb-2" style="color: #192a51;">{{ $jobVacancy->name }}</h5>
                            <p class="card-text text-muted">{{ $jobVacancy->title }}</p>
                            <p class="card-text">
                                Applied on {{ $jobVacancy->created_at ?? 'Unknown Date' }}
                            </p>
                            <div class="col-sm-8">
                                <a href="{{ route('user.jobDetail', ['job' => $jobVacancy->id]) }}" class="btn btn-primary" style="background-color: #682b90; border-color: #682b90;">
                                    View Job Vacancy
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted text-center">You have no active job applications.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $userJobApplications->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <hr class="mt-5">

    @include('components.footer')
@endsection
