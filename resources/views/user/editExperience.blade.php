@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">
    <div class="card shadow">
        <div class="card-header text-center bg-primary text-white">
            <h3>Edit Experience</h3>
        </div>
        <div class="card-body">
            <form action="/update-experience" method="POST">
                @csrf
                <!-- Company Name -->
                <div class="mb-3">
                    <label for="companyName" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Enter company name" required>
                </div>
                <!-- Job Title -->
                <div class="mb-3">
                    <label for="jobTitle" class="form-label">Job Title</label>
                    <input type="text" class="form-control" id="jobTitle" name="jobTitle" placeholder="Enter job title" required>
                </div>
                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Describe your role and achievements" rows="4" required></textarea>
                </div>
                <!-- Start Date -->
                <div class="mb-3">
                    <label for="startDate" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="startDate" name="startDate" required>
                </div>
                <!-- End Date -->
                <div class="mb-3">
                    <label for="endDate" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="endDate" name="endDate">
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="current" name="current">
                        <label class="form-check-label" for="current">I am currently working here</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="company-image" class="form-label">Company Image</label>
                    <input type="file" class="form-control" id="company-image" name="company-image" required>
                </div>
                <!-- Submit Buttons -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{route('user.editProfile')}}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
