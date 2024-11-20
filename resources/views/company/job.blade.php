@extends('layouts.app')

@section('title', 'Job Detail')

@section('custom_css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<style>
    body {
        background-color: #f8f9fa;
    }

    .job-card {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
    }

    .job-header {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .company-logo {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
    }

    .job-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #212529;
    }

    .btn-primary {
        padding: 0.5rem 1.5rem;
        font-size: 1rem;
    }

    .section-title {
        font-size: 1.35rem;
        font-weight: bold;
        margin-bottom: 0.55rem;
    }

    .user-profile{
        min-width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 80px;
    }
    .applicant-details .btn{
        padding: 1.2rem;
    }
</style>
@endsection

@section('content')
@include('components.navbar')
<div class="container mt-5">
    <a href="{{route('company.listJob')}}" class="text-primary text-decoration-none mb-4 d-inline-block">
        <i class="bi bi-arrow-left-circle"></i> Back to Jobs
    </a>

    <div class="job-card">
        <div class="job-header row align-items-md-center d-flex justify-content-between">
            <div class="col-md-8 d-flex align-items-center">
                <div class="row">
                    <div class="col-10 col-md-3 d-flex justify-content-center">
                        <img src="{{asset('assets/bbca.jpeg')}}" alt="Company Logo" class="company-logo mb-3 mt-2" >
                    </div>

                    <div class="col-md-9">
                        <div class="d-flex gap-2">
                            <h1 id="jobTitle" class="job-title">{{$job->title}} - {{$job->company->user->name}}</h1>
                        </div>
                        <div class="d-flex gap-1">
                            <h5 id="jobLocation" class="text-muted">{{$job->address}} · Last Update: {{$job->updated_at->format('d F Y')}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 d-flex">
                @if ($job->is_active == true)
                    <div class="bg-success text-light p-2 rounded-3 ms-auto">Open</div>
                @else
                    <div class="bg-danger text-light p-2 rounded-3 ms-auto">Closed</div>
                @endif
            </div>
        </div>


        <hr class="my-4">

        <div class="job-details">
            <div class="d-flex gap-2">
                <h2 class="section-title">Job Description</h2>
            </div>
            <p class="d-block">{{$job->description}}</p>

            @php
                $requirement = explode("\r\n", $job->requirement);
                $benefit = explode("\r\n", $job->benefit);
            @endphp

            <h2 class="fs-4 mt-4">Requirements</h2>
            @forelse ($requirement as $line)
                <p class="m-0">{{$line}}</p>
                @empty
                <div class="alert alert-danger">
                    No requirement available yet
                </div>
            @endforelse

            <h2 class="fs-4 mt-4">Benefits</h2>
            @forelse ($benefit as $line)
                <p class="m-0">{{$line}}</p>
                @empty
                <div class="alert alert-danger">
                    No requirement available yet
                </div>
            @endforelse

            <div class="mt-4 d-flex align-items-center justify-content-end gap-3">
                <form action="" method="post">
                    @csrf
                    @method('DELETE')
                    <button href="{{route('company.deleteJob', ['job' => $job->id])}}" class="btn btn-outline-danger color-danger">Delete Job</button>
                </form>
                <a href="{{route('company.editJob', ['job' => $job->id])}}" class="btn btn-outline-primary">Edit Details</a>
            </div>
        </div>
    </div>

    <div class="job-card mt-5">
        <div class="job-header justify-content-between">
            <h4 class="fw-bold">List Applicant</h4>
            <a href="" class="btn btn-primary">Export List Applicant</a>
        </div>

        <hr class="my-4">

        <div class="list-applicant">
            <div class="row align-items-center text-center text-md-start mb-3">
                <div class="col-md-4 d-flex align-items-center gap-3 mb-2">
                    <img src="{{asset('assets/formal-person.jpg') }}" alt="User Profile" class="user-profile border-circle">
                    <div>
                        <h5 class="fw-bold m-0">John Doe Jane Doe</h5>
                        <p class="m-0">Junior Back-End Developer</p>
                    </div>
                </div>

                <div class="col-md-3 my-2">
                    <a href="{{ route('getCV',  ['filename' => 'Kalender.pdf']) }}" target="_blank" class="btn btn-primary">Check CV</a>
                </div>

                <div class="col-md-5 d-flex gap-2 justify-content-center justify-content-md-end my-2">
                    <a href="" class="btn btn-danger"><i class="bi bi-x-circle"></i></a>
                    <a href="" class="btn btn-success"><i class="bi bi-check-circle"></i></a>
                </div>
                <hr class="my-4">
            </div>
        </div>
    </div>
</div>

<hr class="mt-5">

@include('components.footer')
@endsection

{{-- @section('custom_script')
<script>
    document.getElementById('statusButton').addEventListener('click', function() {
        var button = this;
        if (button.classList.contains('btn-secondary')) {
            button.classList.remove('btn-secondary');
            button.classList.add('btn-success');
            button.textContent = 'Active';
        } else {
            button.classList.remove('btn-success');
            button.classList.add('btn-secondary');
            button.textContent = 'Inactive';
        }
    });
@endsection --}}
