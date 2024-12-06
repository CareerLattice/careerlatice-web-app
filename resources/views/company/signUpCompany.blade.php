@extends('layouts.app')

@section('title', 'Sign Up - Company')

@section('custom_css')
    <style>
        * {
            padding: 0%;
            margin: 0%;
            box-sizing: border-box;
        }

        .row.g-0 {
            display: flex;
        }

        .left-side {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            overflow: auto;
            box-sizing: border-box;
        }

        .form-custom {
            max-width: 550px;
            margin: 0 auto;
        }

        .form-label {
            font-size: 0.9rem;
        }

        .btn-secondary {
            background-color: #ffffff;
            color: black;
            border: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-secondary:hover {
            background-color: #d3d3d3;
            color: white;
        }

        .btn-custom {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            width: 50%;
            font-size: 1rem;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: #218838;
        }

        .btn-custom:focus {
            outline: none;
        }

        .logo-img {
            width: 350px;
            height: auto;
            display: block;
            margin: 1.2rem auto;
            cursor: pointer;
        }

        .carousel {
            height: 50vh;
        }

        .carousel-inner {
            height: 100%;
        }

        .carousel-item {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

    </style>
@endsection

@section('content')
    <div class="row g-0">
        <div class="col-md-5">
            <div id="carouselExampleFade" class="carousel slide carousel-fade h-100" data-bs-ride="carousel">
                <div class="carousel-inner h-100 d-none d-md-block d-sm-none">
                    <div class="carousel-item active h-100">
                        <img src="{{ asset('assets/businessImage1.jpg') }}" class="d-block w-100 h-100" alt="Image 1" style="object-fit: cover;">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="{{ asset('assets/businessImage2.jpg') }}" class="d-block w-100 h-100" alt="Image 2" style="object-fit: cover;">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="{{ asset('assets/businessImage3.jpg') }}" class="d-block w-100 h-100" alt="Image 3" style="object-fit: cover;">
                    </div>
                </div>
                <div class="carousel-controls">
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev"></button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next"></button>
                </div>
            </div>
        </div>

        <div class="col-md-7 left-side">
            <a href="{{route('signUpPage')}}">
                <button type="button" class="btn btn-dark mt-4 ms-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"></path>
                    </svg>
                </button>
            </a>

            <img src="{{ asset('assets/CareerLatice.jpg') }}" class="logo-img img hoverable" alt="CareerLatice" onclick="window.location='/'">
            <hr>

            <h3 class="text-center mt-4 mb-2">{{__('company/signUpCompany.title')}}</h3>
            <p class="text-center text-muted mb-0" style="font-size: 0.9rem;">{{__('company/signUpCompany.caption')}}</p>
            <form class="form-custom row g-3" action="{{route('company.submitSignUpCompany')}}" method="POST">
                @csrf
                <div class="col-12">
                    <label for="name" class="form-label">{{__('company/signUpCompany.companyName')}} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-12">
                    <label for="inputEmail" class="form-label">{{__('company/signUpCompany.email')}} <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="inputEmail" name="email" required>
                </div>
                <div class="col-12">
                    <label for="inputPassword" class="form-label">{{__('company/signUpCompany.password')}} <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="inputPassword" name="password" required>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">{{__('company/signUpCompany.address')}} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputAddress" name="address" required>
                </div>
                <div class="col-12">
                    <label for="phoneNumber" class="form-label">{{__('company/signUpCompany.phoneNumber')}} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="phoneNumber" placeholder="+62 XXX XXXX" name="phone_number" required>
                </div>
                <div class="col-12">
                    <label for="companyField" class="form-label">{{__('company/signUpCompany.companyField')}} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="companyField" placeholder="Field" name="field" required>
                </div>
                <div class="col-12 text-center">
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input me-2" type="checkbox" id="gridCheck" required>
                        <label class="form-check-label" for="gridCheck">
                            {{__('company/signUpCompany.agree')}}
                        </label>
                    </div>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger mt-2" role="alert">
                        {{$errors->first()}}
                    </div>
                @endif
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-custom">{{__('company/signUpCompany.signUp')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
