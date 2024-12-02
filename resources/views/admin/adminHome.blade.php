@extends('layouts.app')

@section('content')
    @include('components.navbar')
    <style>
        body{
            background-color: #efefef;
        }
    </style>
    <div class="container p-4 my-3" style="border-radius: 12px; background-color: #ffffff">
        <h4 class="text-center text-md-start fw-bold pb-2" style="color: #682b90">Welcome back, Admin!</h4>
        <hr class="my-2">
        <div class="row align-items-center my-4">
            <div class="col-12 col-md-6">
                <h5 class="mb-3">Website Income</h5>
            </div>
            <div class="col-12 col-md-9">
                <div class="row g-2 align-items-end">
                    <div class="col-12 col-md-3">
                        <h6 class="mb-1">From</h6>
                        <input type="date" class="form-control" id="inputDateFrom" name="from">
                    </div>
                    <div class="col-12 col-md-3">
                        <h6 class="mb-1">To</h6>
                        <input type="date" class="form-control" id="inputDateTo" name="to">
                    </div>
                    <div class="col-12 col-md-3">
                        <a href="" class="btn btn-secondary w-100">Search</a>
                    </div>
                    <div class="col-12 col-md-3">
                        <a href="" class="btn btn-primary w-100">Export All Income</a>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <h5>This Month Income</h5>
                <h1 style="color: #682b90"  >Rp. 20.225.000</h1>
            </div>
            <div class="mt-4">
                <h5>Total Income</h5>
                <h1 style="color: #682b90"  >Rp. 1.278.450.000</h1>
            </div>
        </div>
        <hr class="mt-5 mb-2">
        <div class="row align-items-center my-4">
            <div class="col-12 col-md-6">
                <h5 class="mb-3">List of all Premium User</h5>
            </div>
            <div class="col-12 col-md-9">
                <div class="row g-2 align-items-end">
                    <div class="col-12 col-md-3">
                        <h6 class="mb-1">From</h6>
                        <input type="date" class="form-control" id="inputDateFrom" name="from">
                    </div>
                    <div class="col-12 col-md-3">
                        <h6 class="mb-1">To</h6>
                        <input type="date" class="form-control" id="inputDateTo" name="to">
                    </div>
                    <div class="col-12 col-md-3">
                        <a href="" class="btn btn-secondary w-100">Search</a>
                    </div>
                    <div class="col-12 col-md-3">
                        <a href="" class="btn btn-primary w-100">Export All User</a>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <div class="list-applicant">
            <div class="d-flex row align-items-center text-center text-md-start mb-3 justify-content-start">
                <div class="col-md-4 d-flex align-items-center gap-3 mb-2">
                    <img src="{{asset('assets/formal-person.jpg') }}" alt="User Profile" class="user-profile border-circle" style="min-width: 60px; height: 60px; object-fit: cover; border-radius: 80px;">
                    <div>
                        <h5 class="fw-bold m-0">Fajar</h5>
                    </div>
                </div>
    
                <div class="col-md-3 align-items-center">
                    <h6 class="my-2">Since: 20/11/2024</h6>
                </div>
    
                <div class="col-md-3 align-items-center">
                    <h6 class="my-2">Ended: 20/11/2024</h6>
                </div>
            </div>
            <hr class="m-2">

            <div class="d-flex row align-items-center text-center text-md-start mb-3 justify-content-start">
                <div class="col-md-4 d-flex align-items-center gap-3 mb-2">
                    <img src="{{asset('assets/formal-person.jpg') }}" alt="User Profile" class="user-profile border-circle" style="min-width: 60px; height: 60px; object-fit: cover; border-radius: 80px;">
                    <div>
                        <h5 class="fw-bold m-0">Fajar</h5>
                    </div>
                </div>
    
                <div class="col-md-3 align-items-center">
                    <h6 class="my-2">Since: 20/11/2024</h6>
                </div>
    
                <div class="col-md-3 align-items-center">
                    <h6 class="my-2">Ended: 20/11/2024</h6>
                </div>
            </div>
            <hr class="m-2">

            <div class="d-flex row align-items-center text-center text-md-start mb-3 justify-content-start">
                <div class="col-md-4 d-flex align-items-center gap-3 mb-2">
                    <img src="{{asset('assets/formal-person.jpg') }}" alt="User Profile" class="user-profile border-circle" style="min-width: 60px; height: 60px; object-fit: cover; border-radius: 80px;">
                    <div>
                        <h5 class="fw-bold m-0">Fajar</h5>
                    </div>
                </div>
    
                <div class="col-md-3 align-items-center">
                    <h6 class="my-2">Since: 20/11/2024</h6>
                </div>
    
                <div class="col-md-3 align-items-center">
                    <h6 class="my-2">Ended: 20/11/2024</h6>
                </div>
            </div>
            <hr class="m-2">
        </div>
    </div>
    
    @include('components.footer')
@endsection
