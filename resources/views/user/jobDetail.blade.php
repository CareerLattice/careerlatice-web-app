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
        
        .job-type{
            display: inline-block;
            padding: 5px 10px;
            font-size: 14px;
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
            <i class="bi bi-arrow-left-circle"></i> {{__('lang.back')}}
        </a>

        <div class="job-card" style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5rem;">
            <div class="job-header" style="display: flex; align-items: center; gap: 1rem;">
                <div class="row">
                    <div class="col-12 col-md-2 d-flex justify-content-center mb-2">
                        <img src="{{Storage::url($job->job_picture)}}" alt="Company Logo" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                    </div>

                    <div class="jobsTitle col-12 col-md-10">
                        <h1 style="font-size: 1.5rem; font-weight: bold; color: #212529;">{{ $job->title }} - {{ $job->company->user->name }}</h1>
                        <h5 style="color: #6c757d;">{{ $job->address }} · Last Update: {{ $job->updated_at->format('d F Y') }}</h5>
                        <p class="job-type {{ $job->job_type == 'Full-time' ? 'bg-success' : ($job->job_type == 'Part-time' ? 'bg-warning' : 'bg-danger') }} text-center rounded-pill text-white">
                            {{ $job->job_type }}
                        </p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="job-details">
                <h2 style="font-size: 1.25rem; font-weight: bold;" class="mb-0">{{__('lang.jobDesc')}}</h2>
                <p>{{ $job->description }}</p>

                <h2 style="font-size: 1.25rem; font-weight: bold;" class="mb-0">{{__('lang.req')}}</h2>
                @forelse ($requirement as $line)
                    <p class="m-0">{{ $line }}</p>
                @empty
                    <div class="alert alert-danger">
                        {{__('lang.noReq')}}
                    </div>
                @endforelse

                <h2 style="font-size: 1.25rem; font-weight: bold; " class="mb-0 mt-3">{{__('lang.benefits')}}</h2>
                @forelse ($benefit as $line)
                    <p class="m-0">{{ $line }}</p>
                @empty
                    <div class="alert alert-danger">
                        {{__('lang.noBen')}}
                    </div>
                @endforelse

                <div class="text-center mt-4">
                    <form action="{{route('user.applyJob', ['job' => $job->id])}}" method="POST">
                        @csrf
                        <button class="btn btn-primary" type="submit" style="padding: 0.5rem 1.5rem; font-size: 1rem;">{{__('lang.apply')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <hr class="mt-5">
    @include('components.footer')
@endsection
