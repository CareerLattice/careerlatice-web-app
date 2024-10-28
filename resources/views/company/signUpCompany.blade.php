<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Latice</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/signupCompanyPage.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    {{-- End of Bootstrap 5 --}}
</head>
<body>

    {{-- Start of SignUp form --}}

    <div class="row g-0">
        <div class="col-md-7 left-side d-flex flex-column justify-content-center">
            <img src="{{ asset('assets/companyBuilding.png') }}" class="img " alt="companyBuilding">
            <h3 class="custom-text-title">IN CAREERLATTICE<h3>    
            <h2 class="custom-text p-1">Join various other companies</h2>
            <p class="custom-text-under p-1">To create job opportunities and discovering quality talent<p>
            
        </div>

        <div class="col-md-5 right-side">
        <h3 class="text-center mt-5 mb-2">REGISTER YOUR COMPANY HERE</h3>
            <p class="text-center text-muted mb-0" style="font-size: 0.9rem;">Simply register the information below</p>
            <form class="form-custom row g-3" action="{{route('company.submitSignUpCompany')}}" method="POST" onsubmit="return formValidation();">
                @csrf
                <div class="col-12">  
                    <label for="inputCompanyName" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="inputCompanyName">
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
                    <label for="phoneNumber" class="form-label">Company Number</label>
                    <input type="text" class="form-control" id="phoneNumber" placeholder="XXX XXXX">
                </div>
                <div class="col-12">
                    <label for="inputField" class="form-label">Field</label>
                    <input type="text" class="form-control" id="inputField">
                </div>
                <div class="col-12">
                    <label for="inputLocation" class="form-label">Location</label>
                    <input type="text" class="form-control" id="inputLocation">
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

    {{-- End of SignUp form --}}

    </body>
</html>