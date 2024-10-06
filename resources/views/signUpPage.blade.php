<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Latice</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/signupPage.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    {{-- End of Bootstrap 5 --}}
</head>
<body>
{{-- Start of Navbar --}}
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container mt-3 mb-3">
            <img src="{{ asset('assets/CareerLatice.jpg') }}" class="img" alt="CareerLatice">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between w-100" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#" id="Home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#" id="Job">Find a Job</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#" id="Company">Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#" id="Contact">Contact</a>
                    </li>
                </ul>
                <div class="d-grid gap-3 d-md-flex justify-content-md-end">
                    <a href="signUp">
                        <button type="button" class="btn btn-outline-primary">Join Us</button>
                    </a>
                    <button type="button" class="btn btn-outline-dark">Sign In</button>
                </div>
            </div>
        </div>
    </nav>
    {{-- End of Navbar --}}

   


    {{-- Start of SignUp form --}}

    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">
        <div class="text-center mt-3">
            <img src="{{ asset('assets/CareerLatice.jpg') }}" class="img-fluid mb-2" alt="CareerLatice" style="max-width: 50%; height: auto;">
        </div>

        <div class="card p-4" style="width: 500px; ">  
            <h3 class="text-center mb-2">JOIN US NOW</h3>
            <p class="text-center text-muted" style="font-size: 0.9rem;">Simply register your information below</p>
            <form class="row g-3" onsubmit="return formValidation();">
                <div class="col-md-6">  
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputAddress">
                </div>
                <div class="col-12">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phoneNumber" placeholder="+62 123 4567">
                </div>
                <div class="col-12 text-center">
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input me-2" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Agree to terms and conditions
                            </label>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-custom">Sign Up</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function formValidation() {
            const emailInput = document.getElementById("inputEmail").value
            const passwordInput = document.getElementById("inputPassword").value;
            const addressInput = document.getElementById("inputAddress").value;
            const phoneNumber = document.getElementById("phoneNumber").value;
            const checkBoxInput = document.getElementById("gridCheck").checked;

            const emailPattern = /^[^@]+@[a-zA-Z0-9\-]+\.[a-zA-Z]{2,}$/
            const phonePattern = /^\+62\s?\d+(\s\d+)*$/;

            if (!emailPattern.test(emailInput)) {
                alert("Email must end with @something.com");
                return false;
            }

            if (passwordInput.trim() === "") {
                alert("Password field must be filled.");
                return false;
            }

            if (addressInput.trim() === "") {
                alert("Address field must be filled.");
                return false;
            }

            if (!phonePattern.test(phoneNumber)) {
                alert("Phone number must start with +62 followed by digits.");
                return false;
            }

            if(!checkBoxInput){
                alert("You must agree to terms and conditions")
                return false;
            }

            window.location.href = "/HomePage";
            return false;
        }
    </script>

    {{-- End of SignUp form --}}

    </body>
</html>