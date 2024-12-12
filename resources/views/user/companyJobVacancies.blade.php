@extends('layouts.app')

@section('title', $company->user->name . ' Job Vacancies')

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
        <img src="{{ asset('assets/BannerTest.jpg') }}" alt="Company Cover" class="img-fluid"
            style="object-fit: cover; width: 100%; height: 35vh; max-height: 450px;">

        <div class="container position-absolute top-50 start-50 translate-middle"
            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white; padding: 0 15px; width: 100%;">
            <h1 style="font-size: 2rem; font-weight: bold; color: #fff; word-wrap: break-word;">
                Discover Job Vacancies from <span style="color: #0d6efd;">{{ $company->user->name }}</span>
            </h1>
            <p style="font-size: 1.2rem; color: #f5f5f5; word-wrap: break-word;">
                Come and join us to explore ever-evolving things.
            </p>
        </div>
    </div>

    <div class="container mt-4">
        <div class="card" style="background-color: #0d6efd;">
            <div class="card-body">
                <div class="row align-items-center d-flex justify-content-center">
                    <div class="col-12 col-md-6">
                        <h5 style="font-size: 1.2rem; letter-spacing: 1px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); color: #ffffff; font-weight: bold; text-align: center; margin-top: 1rem;">
                            We're Opening these Jobs in {{ $company->user->name }}
                        </h5>
                    </div>

                    <form action="{{route('user.companyJobVacancies', ['company' => $company])}}" method="GET">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-6 mb-2 mb-md-0">
                                <select name="filter" class="form-select form-select-sm" id="filter-group" style="border-color: var(--bs-primary); font-size: 1.1rem; padding: 0.8rem;">
                                    <option value="title">Job Name</option>
                                    <option value="job_type">Job Type</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4 mb-2 mb-md-0">
                                <div class="position-relative">
                                    <input type="search" placeholder="Search Jobs" aria-label="Search" name="search"
                                        class="form-control form-select-sm"
                                        style="border-color: var(--bs-primary); font-size: 1.1rem; padding: 0.8rem; padding-right: 40px;">
                                    <button type="submit" class="position-absolute top-50 translate-middle-y"
                                        style="right: 10px; background: none; border: none; cursor: pointer;">
                                        <i class="fa fa-search" style="font-size: 1.3rem; color: #0d6efd;"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card bg-white">
            <div class="card-body">
                @forelse ($jobs as $job)
                    <div class="row mb-4">
                        <div class="col-10 col-md-5 col-lg-3">
                            <img src="{{asset('upload/company/job_picture/' . $job->job_picture)}}" class="img-thumbnail" style="width: 100%;">
                        </div>

                        <div class="col-12 col-md-6 mt-3 ms-2 d-flex flex-column justify-content-between">
                            <div>
                                <h4 style="font-weight: bold; color: #0d6efd; text-align: left;">{{ $job->title }}</h4>
                                <p class="mb-2" style="background-color: #198754; color: #fff; text-align: center; max-width: 15%; border-radius: 4px;">
                                    @if ($job->is_active == true)
                                        Open
                                    @endif
                                </p>
                                <p style="color: #6c757d; margin-bottom: 0.5rem; text-align: left;">
                                    {{ $job->description }}
                                </p>
                            </div>
                            <div>
                                <p class="text-muted mb-2 text-start" style="font-size: 1rem">{{$job->address}} ({{$job->job_type}})</p>
                                <p class="text-muted mb-2 text-start" style="font-size: 1rem">Last Updated:
                                    @if (gettype($job->updated_at) == 'string')
                                        {{ $job->updated_at }}
                                    @else
                                        {{ $job->updated_at->format('d F Y') }}
                                    @endif
                                </p>
                            </div>
                            <div class="gap-2 mb-3" style="width: 100%;">
                                <a href="{{ route('user.jobDetail', ['job' => $job->id]) }}" class="btn btn-dark">
                                    Apply Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                @empty
                    <div class="alert alert-danger">
                        No job vacancies available.
                    </div>
                @endforelse
            </div>
        </div>

        <div class="d-flex justify-content-end mt-3">
            {{$jobs->links()}}
        </div>
    </div>

    <hr class="mt-5">

    @include('components.footer')
@endsection
