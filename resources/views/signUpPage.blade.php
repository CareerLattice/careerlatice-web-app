@extends('layout.master')

<link href="{{ asset('css/signUpPage.css') }}" rel="stylesheet">

<style>
    @media (max-width: 1040px) {
        h3 {
            font-size: 1.3rem; 
            line-height: 1.4;
            margin-bottom: 1.5rem; 
        }

        .span-text {
            font-size: 1.7rem;
        }

        .col-md-7 h3 {
            padding: 0 1rem; 
        }
    }

    @media (max-width: 768px) {
        h3 {
            font-size: 1.2rem;
            line-height: 1.3;
            margin-bottom: 1rem;
        }

        .span-text {
            font-size: 1.7rem;
        }
    }

    @media (max-width: 480px) {
        h3 {
            font-size: 0.9rem;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .span-text {
            font-size: 1.5rem;
        }
    }
    
</style>
<div class="row bodyclass g-0" style="overflow-x: hidden">
    <div class="col-md-7 justify-content-start">
        <a href="/">
            <button type="button" class="btn btn-dark mt-4 ms-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"></path>
                </svg>
            </button>
        </a>

        <div class="image text-center">
            <img src="{{ asset('assets/CareerLatice.jpg') }}" class="logo-img img hoverable" alt="CareerLatice" onclick="window.location='/'">
        </div>

        <div class="text-left">
            <div class="mb-4">
                <h3 class="mb-3 text-center fs-2 fs-lg-4 fs-md-5 fs-sm-6">
                    Welcome! <span class="span-text fw-bold ls-tight"> Please Choose</span> ur <span class="span-text fw-bold ls-tight">Role!</span> We'll personalize your setup experience accordingly
                </h3>
            </div>
            <div class="align-items-start w-100 buttons">
                <a href="{{route('user.signUpUser')}}" style="text-decoration: none">
                    <button type="button" class="btn btn-green mb-2 d-flex justify-content-start align-items-center text-center">
                            <img src="{{ asset('assets/portfolio.png') }}" alt="portfolio" class="icons">
                            <span>I'm here to apply</span>
                    </button>
                </a>
                <a href="{{route('company.signUpCompany')}}" style="text-decoration: none">
                    <button type="button" class="btn btn-purple mb-2 d-flex justify-content-start align-items-center text-center">
                            <img src="{{ asset('assets/office.png') }}" alt="office" class="icons">
                            <span>I'm hiring talent</span>
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div id="carouselExampleFade" class="carousel slide carousel-fade h-100" data-bs-ride="carousel">
            <div class="carousel-inner h-100 d-none d-md-block d-sm-none">
                <div class="carousel-item active h-100">
                    <img src="{{ asset('assets/joinUsImage1.jpg') }}" class="d-block w-100 h-100" alt="Image 1" style="object-fit: cover;">
                </div>
                <div class="carousel-item h-100">
                    <img src="{{ asset('assets/joinUsImage2.jpg') }}" class="d-block w-100 h-100" alt="Image 2" style="object-fit: cover;">
                </div>
                <div class="carousel-item h-100">
                    <img src="{{ asset('assets/joinUsImage3.jpg') }}" class="d-block w-100 h-100" alt="Image 3" style="object-fit: cover;">
                </div>
            </div>
            <div class="carousel-controls">
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev"></button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next"></button>
            </div>
        </div>
    </div>
</div>
