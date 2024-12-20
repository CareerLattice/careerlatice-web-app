@extends('layouts.app')

@section('custom_css')

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
            .form {
                margin-bottom: 30px;
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
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
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

        h3 {
            font-size: 1.25rem;
            line-height: 1.4;
            letter-spacing: 0.1em;
            text-align: center;
            color: #333;
            margin: 2rem 0;
            font-weight: medium;
            padding: 0 6.5rem 0 6.5rem;
        }

        .text-primary,
        .span-text {
            color: #7869cd;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .form {
            border-radius: 15px;
            background-color: #f8f9fa;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: left;
            margin-top: 1rem;
        }

        .form h2 {
            font-size: 2rem;
            font-weight: bold;
            color: #393f81;
            text-align: left;
        }

        .form-group label {
            font-weight: 600;
            color: #393f81;
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

        .form-group input {
            border: 1px solid #ccc;
        }

        .privacy {
            font-size: 0.85rem;
        }

        @media (max-width: 990px) {
            .logo-img {
                width: 60%;
                height: auto;
            }
        }

        @media (max-width: 425px) {
            .logo-img {
                width: 80%;
            }
        }

        @media (max-width: 320px) {
            .form-group p {
                font-size: 14px;
            }
        }

    </style>
@endsection

@section('content')
    <div class="d-flex">
        <div class="col-md-7">
            <a href="{{route('landingPage')}}">
                <button type="button" class="btn btn-dark mt-4 ms-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"></path>
                    </svg>
                </button>
            </a>

            <img src="{{ asset('assets/CareerLatice.jpg') }}" class="logo-img img hoverable" alt="CareerLatice" onclick="window.location='/'">
            <h3 class="text-center mb-5 fs-lg-2 fs-md-3 fs-sm-2">
                {{__('lang.Welcome back! ')}}<span class="span-text fw-bold ls-tight" >{{__('lang.Log in ')}}</span>{{__('lang. to find ')}}<span class="span-text fw-bold ls-tight" >{{__('lang.skilled talent')}}</span>{{__('lang. and connect with ')}}<span class="span-text fw-bold ls-tight" >{{__('lang.potential')}}</span>{{__('lang. candidates through our platform. ')}}
            </h3>

            <form class="form rounded col-md-7 mx-auto shadow-lg p-4" style="background-color: #f8f9fa;" action="{{route('login')}}" method="POST">
                @csrf
                <input type="hidden" value="company" name="role">
                <h2 class="text-primary mb-4 text-center">{{__('lang.Login Now!')}}</h2>

                <div class="form-group mb-3">
                    <label for="exampleInputEmail1" class="mb-1">{{__('lang.Email Address')}}</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{__('lang.Enter your email')}}" name="email" required>
                    <small id="emailHelp" class="form-text text-muted">{{__('lang.We\'ll never share your email with anyone else.')}}</small>
                </div>

                <div class="form-group mb-4 position-relative">
                    <label for="exampleInputPassword1" class="mb-1">{{__('lang.Password')}}</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="{{__('lang.Enter your password')}}" name="password" required>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger mt-2" role="alert">
                        {{$errors->first()}}
                    </div>
                @endif
                <button type="submit" class="btn btn-primary w-100">{{__('lang.Login')}}</button>

                <p class="mt-3 mb-0 text-center">{{__('lang.Don\'t have an account?')}} <a href="{{route("signUpPage")}}" class="text-decoration-none"> {{ __('lang.Register Here') }}</a></p>
                <p class="text-center">{{__('lang.Forget Password?')}} <a href="{{route("password.request")}}" class="text-decoration-none"> {{ __('lang.Reset Password') }}</a></p>
            </form>

            <p class="privacy col-md-6 mt-4 mx-auto text-center text-muted" style="font-size: 0.85rem;">
                {{__('lang.Your privacy and data security are our top priorities. All personal information, including your email and password, will be kept secure and confidential.')}}
            </p>
        </div>

        <div class="col-md-5 pe-0">
            <div id="carouselExampleFade" class="carousel slide carousel-fade h-100" data-bs-ride="carousel">
                <div class="carousel-inner h-100 d-none d-md-block d-sm-none">
                    <div class="carousel-item active h-100">
                        <img src="{{asset('assets/businessImage1.jpg')}}" class="d-block w-100 h-100" alt="Image 1" style="object-fit: cover;">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="{{asset('assets/businessImage2.jpg')}}" class="d-block w-100 h-100" alt="Image 2" style="object-fit: cover;">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="{{asset('assets/businessImage3.jpg')}}" class="d-block w-100 h-100" alt="Image 3" style="object-fit: cover;">
                    </div>
                </div>
                <div class="carousel-controls">
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev"></button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next"></button>
                </div>
            </div>
        </div>
    </div>
@endsection
