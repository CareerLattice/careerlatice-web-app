<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerLattice</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/signupCompanyPage.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    {{-- End of Bootstrap 5 --}}
</head>
<body>

    {{-- Start of SignUp form --}}

    <div class="row g-0">
        <div class="col-md-5">
            <div id="carouselExampleFade" class="carousel slide carousel-fade h-100" data-bs-ride="carousel">
                <div class="carousel-inner h-100 d-md-block d-sm-none">
                    <div class="carousel-item active h-100">
                        <img src="{{ asset('assets/businessImage1.jpg') }}" class="d-block w-100 h-100" alt="Image 1" style="object-fit: cover;">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="{{ asset('assets/businessImage2.jpg') }}" class="d-block w-100 h-100" alt="Image 2" style="object-fit: cover;">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="{{ asset('assets/businessImage3.jpg') }}" class="d-block w-100 h-100" alt="Image 3" style="object-fit: cover;">
                    </div>
                </div>
                <div class="carousel-controls">
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev"></button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next"></button>
                </div>
            </div>   
        </div>

        <div class="col-md-7 left-side">
            <a href="{{route('signUpPage')}}">
                <button type="button" class="btn btn-dark mt-4 ms-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"></path>
                    </svg>
                </button>
            </a>                

            <img src="{{ asset('assets/CareerLatice.jpg') }}" class="logo-img img hoverable" alt="CareerLatice" onclick="goToLandingPage()">
            <hr>

            <h3 class="text-center mt-4 mb-2">JOIN US NOW</h3>
            <p class="text-center text-muted mb-0" style="font-size: 0.9rem;">Join us today by registering your information below and unlock exciting opportunities!</p>
            <form class="form-custom row g-3" action="{{route('company.submitSignUpCompany')}}" method="POST" onsubmit="return formValidation();">
                @csrf
                <div class="col-md-6">  
                    <label for="inputFirstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="inputFirstName">
                </div>
                <div class="col-md-6">  
                    <label for="inputLastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="inputLastName">
                </div>
                <div class="col-12">  
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail">
                </div>
                <div class="col-12">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputAddress">
                </div>
                <div class="col-12">
                    <label for="inputBirthDate" class="form-label">Birth Date</label>
                    <input type="date" class="form-control" id="inputBirthDate" required>
                </div>
                <div class="col-12">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phoneNumber" placeholder="+62 XXX XXXX">
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
            const companyNameInput = document.getElementById("inputCompanyName").value;
            const emailInput = document.getElementById("inputEmail").value;
            const passwordInput = document.getElementById("inputPassword").value;
            const phoneNumber = document.getElementById("phoneNumber").value;
            const fieldInput = document.getElementById("inputField").value;
            const locationInput = document.getElementById("inputLocation").value;
            const checkBoxInput = document.getElementById("gridCheck").checked;

            const emailPattern = /^[^@]+@[a-zA-Z0-9\-]+\.[a-zA-Z]{2,}$/;
            const phonePattern = /^(?:\+?\d{2}\s?)?\d+(-\d+)*(\s\d+(-\d+)*)*$/;

            if(companyNameInput.trim() === ""){
                alert("Company name field must be filled.");
                return false;
            }

            if (!emailPattern.test(emailInput)) {
                alert("Email must end with @something.com");
                return false;
            }

            if (passwordInput.trim() === "") {
                alert("Password field must be filled.");
                return false;
            }

            if (!phonePattern.test(phoneNumber)) {
                alert("Phone number must be valid.");
                return false;
            }

            if (fieldInput.trim() === "") {
                alert("Company Field must be filled.");
                return false;
            }

            if (locationInput.trim() === "") {
                alert("Address field must be filled.");
                return false;
            }

            if(!checkBoxInput){
                alert("You must agree to terms and conditions")
                return false;
            }

            window.location.href = "/landingPage";
            return false;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB30NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        function goToLandingPage() {
            window.location.href = '/'; 
        }   
    </script>

    {{-- End of SignUp form --}}

    </body>
</html>