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
            <a href="/">
                <button type="button" class="btn btn-secondary justify-start mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"></path>
                    </svg>
                </button>
            </a>
                <div class="image mb-2 text-center">
                    <img src="{{asset('assets/CareerLatice.jpg')}}" class="img" style="width: auto; height: 6.8rem;" alt="CareerLatice">
                </div>  
                    
                <div class="text-left">
                    <div class="mb-4">
                        <h1 class="mb-1">Who are you?</h1>
                        <p class="mb-2">We'll personalize your setup experience accordingly</p>
                    </div>
                    <div class="align-items-start w-100 buttons">
                        <a href="{{route('user.signUpUser')}}">
                            <button type="button" class="btn btn-green mb-2 d-flex justify-content-start align-items-center text-center">
                                    <img src="{{ asset('assets/portfolio.png') }}" alt="portfolio" class="icons">
                                    <span>I'm here to apply</span>
                            </button>
                        </a>
                        <a href="{{route('company.signUpCompany')}}">
                            <button type="button" class="btn btn-purple mb-2 d-flex justify-content-start align-items-center text-center">
                                    <img src="{{ asset('assets/office.png') }}" alt="office" class="icons">
                                    <span>I'm hiring talent</span>
                            </button>
                        </a>
                    </div>
                </div>      
        </div>

        <div class="col-md-5 custom-bg vh-100 d-flex justify-content-center align-items-center rightside">
            
        </div>
    </div>

</body>
</html>