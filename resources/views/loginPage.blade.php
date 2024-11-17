<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerLattice</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="icon" href="{{asset('assets/logo.png')}}">
    <link href="{{ asset('css/loginPage.css') }}" rel="stylesheet">

</head>
<body>

<!-- Navbar Start -->
<!-- Tambahkan di dalam tag <nav> -->
    @include('components.navbar')

<!-- Navbar End -->

<!-- Main Program -->
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="left-side col-md-6 col-sm-12 text-center">
                <h2 class="left-side-container-h2 mt-4 fw-bold">Login For<span class="company-span-container"> Companies</span></h2>
                <p class="left-side-container-p mt-2">Establish partnerships with talented developers ready to contribute to your organization.</p>
                <button type="button" class="btns btn-outline-primary" onclick="window.location.href='{{ route('company.loginCompany') }}'">Login as Company</button>
                <p class="forget mt-3 text-center" style="color: #393f81;">Don't have an account? <a href="{{route("company.signUpCompany")}}" style="color: #393f81;">Register here</a></p>

            </div>

            <div class="right-side col-md-6 col-sm-12 text-center">
                <h2 class="left-side-container-h2 mt-4 fw-bold">Login For<span class="user-span-container"> Users</span></h2>
                <p class="left-side-container-p mt-2">Finding personalized job opportunities tailored to your skills and interests.</p>
                <button type="button" class="btns btn-outline-primary" onclick="window.location.href='{{ route('user.loginUser') }}'">Login as User</button>
                <p class="forget mt-3 text-center" style="color: #393f81;">Don't have an account? <a href="{{route("user.signUpUser")}}" style="color: #393f81;">Register here</a></p>

            </div>
        </div>
    </div>
</main>

<!-- End Main -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
{{-- Start of Bootstrap 5 --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB30NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
{{-- End of Bootstrap 5 --}}
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html
