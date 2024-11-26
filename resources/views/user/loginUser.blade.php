@extends('layouts.app')

@section('title', 'Login')

@section('custom_css')
    <link href="{{ asset('css/loginDeveloper.css') }}" rel="stylesheet">
    <style>
        #alert {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1000;
            padding: 10px 20px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
        }

        .fade-out {
            animation: fadeOut 5s forwards;
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }

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
@endsection

@section('content')
    @if(session('message') != '')
        <div class="alert alert-success fade-out" role="alert" id="alert">
            {{session('message')}}
            {{session()->forget('message')}}
        </div>
    @endif

    <main>
        <div class="container-fluid h-100" style="overflow-x: hidden">
            <div class="row h-100">
                <!-- Carousel Column -->
                <div class="col-md-5 p-0">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade h-100" data-bs-ride="carousel">
                        <div class="carousel-inner h-100 d-none d-md-block d-sm-none">
                            <div class="carousel-item active h-100">
                                <img src="{{ asset('assets/loginDevPic1.jpg') }}" class="d-block w-100 h-100" alt="Image 1" style="object-fit: cover;">
                            </div>
                            <div class="carousel-item h-100">
                                <img src="{{ asset('assets/loginDevPic2.jpg') }}" class="d-block w-100 h-100" alt="Image 2" style="object-fit: cover;">
                            </div>
                            <div class="carousel-item h-100">
                                <img src="{{ asset('assets/loginDevPic3.jpg') }}" class="d-block w-100 h-100" alt="Image 3" style="object-fit: cover;">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev"></button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next"></button>
                    </div>
                </div>

                <div class="col-md-7 text-centerd-flex flex-column justify-content-center">

                    <a href="{{route('landingPage')}}">
                        <button type="button" class="btn btn-dark mt-4 ms-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"></path>
                            </svg>
                        </button>
                    </a>

                    <img src="{{ asset('assets/CareerLatice.jpg') }}" class="logo-img img hoverable" alt="CareerLatice" onclick="window.location='/'">
                    <h3 class="text-center mb-5">
                        Welcome back! <span class="span-text text-primary fw-bold ls-tight">Log in</span> to discover <span class="span-text text-primary fw-bold ls-tight">job opportunities </span> and <span class="span-text text-primary fw-bold ls-tight">connect </span>with potential employers  through our platform.
                    </h3>


                    <form class="form rounded col-md-7 mx-auto shadow-lg p-4" style="background-color: #f8f9fa" method="POST" action="{{route('login')}}">
                        @csrf
                        <input type="hidden" value="not_company" name="role">
                        <h2 class="text-primary mb-4 text-center">Login Now!</h2>

                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="mb-1">Email Address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email" name="email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>

                        <div class="form-group mb-4 position-relative">
                            <label for="exampleInputPassword1" class="mb-1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password" name="password">
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger mt-2" role="alert">
                                {{$errors->first()}}
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary w-100">Login</button>

                        <p class="mt-3 text-center" style="color: #393f81;">Don't have an account? <a href="{{route("user.signUpUser")}}" style="color: #393f81;">Register here</a></p>
                    </form>
                    <p class="privacy col-md-6 mt-4 mx-auto text-center text-muted" style="font-size: 0.85rem;">
                        Your privacy and data security are our top priorities. All personal information, including your email and password, will be kept secure and confidential.
                    </p>
                </div>
            </div>
        </div>
    </main>
@endsection
