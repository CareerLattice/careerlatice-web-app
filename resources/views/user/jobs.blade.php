<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .img {
            width: 13%;
            height: auto;
        }
        
        @media (max-width: 1206px) {
            .right-img{
                width:100%;
            }
        }
        .form-control, .form-select, .btn {
            height: 40px;
        }
    </style>
</head>
<body>
    @include('components.navbar')
    
    <section style="background-color: #fff;">
        <div class="container">
            <div class="row pt-5 pb-5 d-flex justify-content-center">
                <div class="col-12 col-md-5 mt-5 text-center text-md-start">
                    <p class="fw-bold" style="color: gray; font-size: 1.1rem;">
                        Explore and connect with <strong>500+</strong> reputable companies
                    </p>
                    <h2 class="fw-bold" style="color: #682b90; font-size: calc(1.5rem + 1vw);">
                        Launch Your Career with <span style="color: #7869cd;">Top Industry Leaders</span>
                    </h2>
    
                    <div class="mt-4 d-flex flex-column flex-md-row align-items-center gap-2">
                        <button type="button" class="btn btn-primary w-100 w-md-auto" style="padding: 0.5rem 1.5rem; font-size: 1.1rem;">
                            Update Profile
                        </button>
                        <button type="button" class="btn btn-secondary w-100 w-md-auto" style="padding: 0.5rem 1.5rem; font-size: 1.1rem;">
                            Discover Premium
                        </button>
                    </div>
    
                    <p class="fw-bold mt-3" style="color: gray;">Contact us for more information!</p>
    
                    <ul class="list-unstyled list-inline mt-2 d-flex justify-content-center justify-content-md-start gap-2">
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/" class="text-dark">
                                <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://x.com/" class="text-dark">
                                <i class="bi bi-twitter" style="font-size: 1.5rem;"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.google.co.id/" class="text-dark">
                                <i class="bi bi-google" style="font-size: 1.5rem;"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://id.linkedin.com/" class="text-dark">
                                <i class="bi bi-linkedin" style="font-size: 1.5rem;"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/" class="text-dark">
                                <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
                            </a>
                        </li>
                    </ul>
                </div>
    
                <div class="col-12 col-md-7 text-center">
                    <img src="{{ asset('assets/11464491.jpg') }}" class="img-fluid" alt="Company Image" style="max-width: 70%; height: auto;" />
                </div>
            </div>
            <hr>
        </div>
    </section>
    

    <section>
        
        <div class="container mt-5 text-center">
            <h1 class="fw-bold ">
                Discover Exciting <span style="color: #682b90">Job Vacancies</span>
            </h1>
            <p class="fw-bold" style="color: #7869cd">
                Browse over 200+ Top Jobs Vacancy from Top Industry Leaders
            </p>
        </div>  

        <div class="container">
            <form class="d-flex flex-column flex-md-row mb-5 justify-content-center" role="search" action="{{route('user.searchCompany')}}" method="GET">
                <!-- Search Input -->
                <input style="width: 500px" class="form-control mb-2 mb-md-0 me-md-2" type="search" placeholder="Discover Job" aria-label="Search" name="search" required>
                
                <!-- Select Filter with smaller width -->
                <select name="filter" class="form-select form-select-sm mb-2 mb-md-0 me-md-2" id="filter-group" style="border-color: var(--bs-primary); width: 150px;">
                    <option value="x">Filter</option>
                    <option value="name">Company Name</option>
                    <option value="field">Job Title</option>
                </select>
                
                <!-- Submit Button -->
                <button class="btn btn-outline-success mb-2 mb-md-0" type="submit">Search</button>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger mt-3 text-center mx-auto" style="width: 40%;">
                    {{$errors->first('filter')}}
                </div>
            @endif
        </div>
    
        <div class="container d-flex justify-content-center">
            <div class="row" style="width: 100%; max-width: 1000px;"> 
                @for($i = 0; $i < 5; $i++)
                    <div class="card mb-3" style="width: 100%;"> 
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{asset('assets/bbca.jpeg')}}" class="img-fluid rounded-start" alt="..." style="height: 100%; object-fit: contain;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-3">
                                    <h5 class="card-title fs-4 fw-bold" style="text-align: left; margin-bottom: 0.5rem; color: #682b90">Senior Back-end Developer</h5>
                                    <p class="card-text text-dark mb-1" style="text-align: justify; font-size: 1rem;">Bank Central Asia</p>
                                    <p class="card-text mb-1" style="text-align: justify; color: gray; font-size: 0.9rem;">Jakarta, Indonesia (On-Site)</p>
                                    <p class="card-text mb-2" style="text-align: justify; font-size: 0.95rem;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga at dolorem eveniet dolorum, sequi quos nesciunt doloremque recusandae debitis minus voluptate quae, ut accusamus quis? Dicta neque pariatur ipsum reprehenderit corrupti, nihil repellat illum quod ea fuga facilis accusantium quae quasi odio, incidunt molestias ab porro quidem vero facere eligendi!</p>
                                    <p class="card-text mb-1 fw-bold" style="text-align: justify; font-size: 0.95rem;">Meet the hiring team <a href="" style="text-decoration: none"><strong>Michelle Joanne</strong></a></p>
                                    <p class="card-text mb-0"><small class="text-body-secondary">Last updated November 20, 2024</small></p>
                                
                                    <div class="mt-2 d-flex flex-column flex-md-row align-items-center gap-2">
                                        <a href="#" class="btn btn-primary btn-lg w-100 w-md-auto d-flex justify-content-center align-items-center" style="padding: 0.5rem 1.5rem; font-size: 1.1rem;">
                                            Apply Now
                                        </a>
                                        
                                        <a href="#" class="btn btn-secondary btn-lg w-100 w-md-auto d-flex justify-content-center align-items-center" style="padding: 0.5rem 1.5rem; font-size: 1.1rem;">
                                            View Company
                                        </a>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <hr>
    </section>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB30NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>