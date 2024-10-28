<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/landingPage.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loginDeveloper.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
<!-- Main Start -->

@if($success != '')
    <div class="alert alert-success" role="alert">
        {{$success}}
    </div>
@endif

<main>
    <div class="container-fluid vh-100">
        <div class="row">
            <div class="left col-md-6 d-flex flex-column justify-content-center align-items-center">
                <img src="{{asset('assets/loginDeveloper.jpg')}}" class="img cover">
            </div>
            <div class="right col-md-6 d-flex flex-column justify-content-center align-items-center position-relative">
                <a href="{{route('loginPage')}}">
                    <button type="button" class="btn btn-secondary position-absolute top-0 start-0 mt-3 ms-3"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"></path>
                        </svg>
                    </button>
                </a>
                <img src="{{asset('assets/CareerLatice.jpg')}}" class="img" alt="CareerLatice">
                
                <form class="form shadow-lg rounded" method="POST" action="{{route('user.submitLoginUser')}}">
                    @csrf
                    <div class="form-group">
                        <p class="fw-bold" style="text-align: center; font-size:1.3rem;">Welcome Back to CareerLattice</p>
                        <p class="fs-10 fw-bold">Are u ready to code? </p>
                        <label for="exampleInputEmail1" class="mb-2">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group mb-1">
                        <label for="exampleInputPassword1" class="mb-2 mt-2">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger mt-2" role="alert">
                            {{$errors->first()}}
                        </div>
                     @endif
                    <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

</body>
</html>