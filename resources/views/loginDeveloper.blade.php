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

<main>
<div class="container-fluid vh-100">
    <div class="row">
        <div class="left col-md-6 d-flex flex-column justify-content-center align-items-center">
            <img src="{{asset('assets/loginDeveloper.jpg')}}" class="img cover">
        </div>
        <div class="right col-md-6 d-flex flex-column justify-content-center align-items-center">
            <img src="{{ asset('assets/CareerLatice.jpg') }}" class="img mb-3" alt="CareerLatice">
                <form class="form shadow-lg rounded">
                    <div class="form-group">
                        <p class="fw-bold">Welcome Back to CareerLattice</p>
                        <p class="fs-10">Ready to code? </p>
                        <label for="exampleInputEmail1" class="mb-2">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group mb-1">
                        <label for="exampleInputPassword1" class="mb-2 mt-2">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group form-check mb-4">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<!-- Main End -->


</body>
</html>