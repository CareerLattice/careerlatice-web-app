@extends('layouts.app')

@section('title', 'Edit Job Detail')

@section('custom_css')
    <style>
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
            width: 160px;
            height: 160px;
            object-fit: cover;
            border-radius: 8px;
        }

        .job-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #212529;
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

        .image-container {
            position: relative;
            display: inline-block;
            width: 160px;
            height: 160px;
        }

        .change-image-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            border: none;
            border-radius: 9px;
            width: 160px;
            height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .image-container:hover .change-image-btn {
            opacity: 1;
        }
    </style>
@endsection

@section('content')
    @include('components.navbar')
    <div class="container mt-5">
        <a href="{{route('company.job', ['job' => $job->id])}}" class="text-primary text-decoration-none mb-4 d-inline-block">
            <i class="bi bi-arrow-left-circle"></i> Cancel Edit
        </a>

        <div class="job-card">
            <div class="job-header">
                <h2>Edit Job Details</h2>
            </div>

            <hr class="my-1">
            <form action="{{route('company.updateJob', ['job' => $job])}}" method="POST">
                @csrf
                <div class="d-flex flex-column justify-content-center">
                    <label for="title"><h2 class="fs-4 m-0 mt-3 mb-2">Job Image</h2></label>
                    <div class="image-container">
                        <img src="{{asset('assets/bbca.jpeg')}}" alt="Company Logo" class="company-logo">
                        <input type="file" id="uploadImage" name="job_image" style="display: none;">
                        <label for="uploadImage" class="change-image-btn">
                            <i class="bi bi-pencil-fill fs-5"></i>
                        </label>
                    </div>
                </div>

                <label for="title"><h2 class="fs-4 m-0 mt-3">Title</h2></label>
                <input id="title" type="text" class="form-control" value="{{ $job->title }}" name="title" required>

                <label for="address"><h2 class="fs-4 m-0 mt-3">Address</h2></label>
                <input id="address" type="text" class="form-control" value="{{ $job->address }}" name="address" required>

                <label for="description"><h2 class="fs-4 m-0 mt-3">Description</h2></label>
                <textarea id="description" class="form-control d-block" name="description" rows="5" required>{{ $job->description }}</textarea>

                <label for="requirement"><h2 class="fs-4 m-0 mt-3">Job Requirement</h2></label>
                <textarea id="requirement" class="form-control d-block" name="requirement" rows="5" required>{{ $job->requirement }}</textarea>

                <label for="benefit"><h2 class="fs-4 m-0 mt-3">Job Benefit</h2></label>
                <textarea id="benefit" class="form-control d-block" name="benefit" rows="5" required>{{ $job->benefit }}</textarea>

                <div class="d-flex mt-3 justify-content-between">
                    <div style="width:45%">
                        <label for="is_active"><h2 class="fs-4 m-0 me-2">Status</h2></label>
                        <select id="is_active" class="form-select" name="is_active" required>
                            <option value="1" @if($job->is_active == true) selected @endif>Open</option>
                            <option value="0" @if($job->is_active == false) selected @endif>Closed</option>
                        </select>
                    </div>

                    <div style="width:45%">
                        <label for="job_type"><h2 class="fs-4 m-0 me-2">Job Type</h2></label>
                        <select id="job_type" class="form-select" name="job_type" required>
                            <option value="Full-time" @if($job->job_type == 'Full-time') selected @endif>Full-time</option>
                            <option value="Part-time" @if($job->job_type == 'Part-time') selected @endif>Part-time</option>
                            <option value="Internship" @if($job->job_type == 'Internship') selected @endif>Internship</option>
                            <option value="Freelance" @if($job->job_type == 'Freelance') selected @endif>Freelance</option>
                        </select>
                    </div>
                </div>

                <label for="person_in_charge"><h2 class="fs-4 m-0 mt-3">Person In Charge</h2></label>
                <input id="person_in_charge" type="text" class="form-control" value="{{ $job->person_in_charge }}" name="person_in_charge" required>

                <label for="contact_person"><h2 class="fs-4 m-0 mt-3">Contact Person</h2></label>
                <input id="contact_person" type="text" class="form-control" value="{{ $job->contact_person }}" name="contact_person" required>

                <div class="mt-4 d-flex align-items-center justify-content-center gap-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    <hr class="mt-5">

    @include('components.footer')
@endsection
