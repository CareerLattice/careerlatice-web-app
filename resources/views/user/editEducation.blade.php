@extends('layouts.app')

@section('title', 'Edit Education')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="card shadow">
            <div class="card-header text-center bg-primary text-white">
                <h3>Edit Education</h3>
            </div>
            <div class="card-body">
                <form action="/update-education" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="school" class="form-label">School/University</label>
                        <input type="text" class="form-control" id="school" name="school" placeholder="Enter school or university name" required>
                    </div>
                    <div class="mb-3">
                        <label for="degree" class="form-label">Degree</label>
                        <input type="text" class="form-control" id="degree" name="degree" placeholder="Enter degree (e.g., Bachelor of Science)" required>
                    </div>
                    <div class="mb-3">
                        <label for="field" class="form-label">Field of Study</label>
                        <input type="text" class="form-control" id="field" name="field" placeholder="Enter field of study" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter Description" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gpa" class="form-label">GPA</label>
                        <input type="number" class="form-control" id="gpa" name="gpa" placeholder="Enter GPA" step="0.01" min="0" max="4.0" required>
                    </div>
                    <div class="mb-3">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="endDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="endDate" name="endDate">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a href="{{route('user.updateProfile')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
