<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Latice</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/signupDevPage.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    {{-- End of Bootstrap 5 --}}
</head>
<body>

    {{-- Start of SignUp form --}}

    <div class="row g-0">
        <div class="col-md-6 left-side d-flex flex-column justify-content-center">
            <h3 class="text-center mt-5 mb-2">JOIN US NOW</h3>
            <p class="text-center text-muted mb-0" style="font-size: 0.9rem;">Simply register your information below</p>
            <form class="form-custom row g-3" action="" method="POST" onsubmit="return formValidation();">
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

        <div class="col-md-6 right-side">
            <img src="{{ asset('assets/CareerlaticeSignupUser.png') }}" class="img" alt="CareerLaticeUser" style="max-width: 100%; height: auto; padding: 2rem;">
        </div>
    </div>

    <script>
        function formValidation() {
            const firstNameInput = document.getElementById("inputFirstName").value;
            const lastNameInput = document.getElementById("inputLastName").value;
            const emailInput = document.getElementById("inputEmail").value;
            const passwordInput = document.getElementById("inputPassword").value;
            const addressInput = document.getElementById("inputAddress").value;
            const birthDateInput = document.getElementById("inputBirthDate").value;
            const phoneNumber = document.getElementById("phoneNumber").value;
            const checkBoxInput = document.getElementById("gridCheck").checked;

            const emailPattern = /^[^@]+@[a-zA-Z0-9\-]+\.[a-zA-Z]{2,}$/
            const phonePattern = /^\+62\s?\d+(-\d+)*(\s\d+(-\d+)*)*$/;

            if(firstNameInput.trim() === ""){
                alert("First name field must be filled.");
                return false;
            }

            if(lastNameInput.trim() === ""){
                alert("Last name field must be filled.");
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

            if (addressInput.trim() === "") {
                alert("Address field must be filled.");
                return false;
            }

            if (birthDateInput === "") {
                alert("Birth date field must be filled.");
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