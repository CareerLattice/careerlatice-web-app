<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CareerLatice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/signUpPage.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="row bodyclass g-0">
        <div class="col-md-7 justify-content-start">
                <div class="image mb-2 text-center">
                    <img src="{{ asset('assets/CareerLatice.jpg') }}" class="img" style="max-width: auto; height: 4rem;" alt="CareerLatice">
                </div>
                    
                <div class="text-left">
                    <div class="mb-4">
                        <h1 class="mb-1">Who are you?</h1>
                        <p class="mb-2">We'll personalize your setup experience accordingly</p>
                    </div>
                    <div class="align-items-start w-100">
                        <a href="signUpDev">
                            <button type="button" class="btn btn-green mb-2 d-flex justify-content-start align-items-center text-center">
                                    <img src="{{ asset('assets/portfolio.png') }}" alt="portfolio" class="icons">
                                    <span>I'm here to apply</span>
                            </button>
                        </a>
                        <a href="signUpCompany">
                            <button type="button" class="btn btn-purple mb-2 d-flex justify-content-start align-items-center text-center">
                                    <img src="{{ asset('assets/office.png') }}" alt="office" class="icons">
                                    <span>I'm hiring talent</span>
                            </button>
                        </a>
                    </div>
                </div>      
        </div>

        <div class="col-md-5 bg-dark text-white vh-100 d-flex justify-content-center align-items-center rightside">
            
        </div>
    </div>

</body>
</html>