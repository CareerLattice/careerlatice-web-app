@extends('layouts.app')

@section('title', 'Login')

@section('custom_css')
    <link href="{{ asset('css/loginPage.css') }}" rel="stylesheet">
@endsection

@section('content')
    @include('components.navbar')

    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="left-side col-md-6 col-sm-12 text-center">
                    <h2 class="left-side-container-h2 mt-4 fw-bold">Login For<span class="company-span-container"> Companies</span></h2>
                    <p class="left-side-container-p mt-2">Establish partnerships with talented developers ready to contribute to your organization.</p>
                    <button type="button" class="btns btn-outline-primary" onclick="window.location.href='{{ route('login') }}'">Login as Company</button>
                    <p class="forget mt-3 text-center" style="color: #393f81;">Don't have an account? <a href="{{route("company.signUpCompany")}}" style="color: #393f81;">Register here</a></p>

                </div>

                <div class="right-side col-md-6 col-sm-12 text-center">
                    <h2 class="left-side-container-h2 mt-4 fw-bold">Login For<span class="user-span-container"> Users</span></h2>
                    <p class="left-side-container-p mt-2">Finding personalized job opportunities tailored to your skills and interests.</p>
                    <button type="button" class="btns btn-outline-primary" onclick="window.location.href='{{ route('login') }}'">Login as User</button>
                    <p class="forget mt-3 text-center" style="color: #393f81;">Don't have an account? <a href="{{route("user.signUpUser")}}" style="color: #393f81;">Register here</a></p>
                </div>
            </div>
        </div>
    </main>
    @include('components.footer')
@endsection

@section('custom_script')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
