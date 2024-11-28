@extends('layouts.app')

@section('title', 'Edit Experience')

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
                </div>
                <div class="mb-3">
                    <label for="company-image" class="form-label">Company Image</label>
                    <input type="file" class="form-control" id="company-image" name="company-image" required>
                </div>
                <!-- Submit Buttons -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{route('updateUser')}}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
