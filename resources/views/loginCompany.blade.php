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
<!-- Main Start -->

<main>
<div class="container-fluid vh-100">
    <div class="row">
        <div class="left col-md-6 d-flex flex-column justify-content-center align-items-center">
        <!-- Konten untuk layar bagian kiri -->
            <h5 class="mb-4 font-weight-bold"><span class= "first">Career</span><span class="second">Lattice</span></h5>
            <form class="form shadow-lg rounded">
                <div class="form-group">
                    <p class="text-center fw-bold">Welcome to CareerLattice</p>
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary loginButton">Login</button>
            </form>
        </div>
        <div class="right col-md-6 bg-black  d-flex flex-column justify-content-center align-items-center">
            <!-- Konten untuk layar bagian kanan -->
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