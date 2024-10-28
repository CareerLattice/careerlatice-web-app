<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/landingPage.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loginCompany.css') }}" rel="stylesheet">
</head>
<body>
    
<main>
<div class="container-fluid vh-100">
    <div class="row">
        <div class="left col-md-6 d-flex flex-column justify-content-center align-items-center">
        <img src="{{ asset('assets/CareerLatice.jpg') }}" class="img" alt="CareerLatice">
            <form class="form shadow-lg rounded" action="{{route('company.submitLoginCompany')}}" method="POST">
                @csrf
                <a href="{{route('loginPage')}}">
                <button type="button" class="btn btn-secondary position-absolute top-0 start-0 mt-3 ms-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"></path>
                    </svg>
                  </button>
                </a>
                <div class="form-group">
                    <p class="fw-bold" style="text-align: center; font-size:1.3rem;">Welcome Back to CareerLattice</p>
                    <label for="exampleInputEmail1" class="mb-2">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted mb-2">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="mt-2 mb-2">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label mb-3" for="exampleCheck1">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary loginButton">Login</button>
            </form>
        </div>
        <div class="right col-md-6 bg-black  d-flex flex-column justify-content-center align-items-center">
            <p class="fw-bold text-light">E B O O K</p>
            <p class="fs-1 text-light fw-bold">How to Build a Tech Talent Brand : The Definitive Guide</p>
            <p class="text-light">
                Looking to hire top tech talent? To attract the best candidates, it's essential to have a standout employer brand. We've put together the ultimate guide to help you build a strong tech talent brand and make your recruitment process smoother
            </p>
            <p class="text-light">"John Alex - 2021"</p>
        </div>
    </div>
  </div>
</main>

<!-- Main End -->
</body>
</html>