@extends('layouts.app')

@section('title', 'Job Detail')

@section('custom_css')
    <style>
        @media (max-width: 576px) {
            .jobsTitle h1 {
                font-size: 1.4rem;
            }

            .jobsTitle h5 {
                font-size: 1.2rem;
            }
        }

        @media (max-width: 320px) {
            .jobsTitle h1 {
                font-size: 1.1rem;
            }

            .jobsTitle h5 {
                font-size: 1rem;
            }
        }
    </style>
@endsection

@section('content')
    @if (session('message') != '')
        <div class="alert alert-success fade-out" role="alert" id="alert">
            {{ session('message') }}
            {{ session()->forget('message') }}
        </div>
    @endif

    @include('components.navbar')

    <div class="container mt-4">
        <a href="{{ route('companies') }}" class="text-primary text-decoration-none mb-4 d-inline-block">
            <i class="bi bi-arrow-left-circle"></i> Back to Company
        </a>

        <div class="job-card" style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5rem;">
            <div class="job-header" style="display: flex; align-items: center; gap: 1rem;">
                <div class="row w-100">
                    <div class="col-12 col-md-2 d-flex justify-content-center mb-2">
                        <img src="{{ asset('assets/bbca.jpeg') }}" alt="Company Logo" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                    </div>

                    <div class="jobsTitle col-12 col-md-10">
                        <h1 style="font-size: 1.5rem; font-weight: bold; color: #212529;">{{ $job->title }} - {{ $job->company->user->name }}</h1>
                        <h5 style="color: #6c757d;">{{ $job->address }} · Last Update: {{ $job->updated_at->format('d F Y') }}</h5>
                        <p class="p-2 {{ $job->job_type == 'Full Time' ? 'bg-success' : ($job->job_type == 'Part Time' ? 'bg-warning' : 'bg-danger') }} rounded-pill text-center" 
                            style="width: 10%; background-color: {{ $job->job_type == 'Full Time' ? '#198754' : ($job->job_type == 'Part Time' ? '#ffc107' : '#dc3545') }}; color: white;">
                            {{ $job->job_type }}
                        </p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="job-details">
                <h2 style="font-size: 1.25rem; font-weight: bold;" class="mb-0">Job Description</h2>
                <p>{{ $job->description }}</p>

                <h2 style="font-size: 1.25rem; font-weight: bold;" class="mb-0">Requirements</h2>
                @forelse ($requirement as $line)
                    <p class="m-0">{{ $line }}</p>
                @empty
                    <div class="alert alert-danger">
                        No requirement available yet
                    </div>
                @endforelse

                <h2 style="font-size: 1.25rem; font-weight: bold; " class="mb-0 mt-3">Benefits</h2>
                @forelse ($benefit as $line)
                    <p class="m-0">{{ $line }}</p>
                @empty
                    <div class="alert alert-danger">
                        No benefit available yet
                    </div>
                @endforelse

                <div class="text-center mt-4">
                    <form action="{{ route('user.applyJob', ['job' => $job->id]) }}" method="POST">
                        @csrf

                        <button class="btn btn-primary" type="submit" style="padding: 0.5rem 1.5rem; font-size: 1rem;">Apply Now</button>
                    </form>
                </div>

               
            </div>
        </div>
    </div>

    <hr class="mt-5">
    @include('components.footer')
@endsection
