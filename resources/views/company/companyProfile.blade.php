@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="container my-5">
        <a href="{{route('company.home')}}" class="text-primary text-decoration-none mb-4 d-inline-block">
            <i class="bi bi-arrow-left-circle"></i> Back
        </a>
        <div class="text-center mb-5">
            <h2>Edit Company Profile</h2>
            <p class="text-muted">Update your company information to keep your profile up-to-date.</p>
        </div>


        <div class="card shadow-sm">
            <div class="card-body p-5">
                <form action="{{route('company.updateProfile')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label"><strong>Company Name</strong></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter company name" value="{{Auth::user()->name}}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="field" class="form-label"><strong>Field</strong></label>
                            <input type="text" class="form-control" id="field" name="field" placeholder="Enter company field" value="{{$company->field}}" required>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="address" class="form-label"><strong>Company Address</strong></label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter company address" value="{{$company->address}}" required></input>
                        </div>
                        <div class="col-md-6">
                            <label for="phone_number" class="form-label"><strong>Phone Number</strong></label>
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Enter company phone number" value="{{Auth::user()->phone_number}}" required>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="description" class="form-label"><strong>Company Description</strong></label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Write a short description about the company" required>{{$company->description}}</textarea>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex flex-column">
                            <label for="logo" class="form-label">Upload Company Logo</label>
                            <div class="d-flex align-items-center">
                                <img src="{{Storage::url(Auth::user()->profile_picture)}}" alt="Profile Picture" class="rounded-circle me-2" style="max-width: 100px; max-height: 100px;" />
                                <input type="file" class="form-control" id="logo" name="logo" style="width: 50%;">
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg px-4">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
