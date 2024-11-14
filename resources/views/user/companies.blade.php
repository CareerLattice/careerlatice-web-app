<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Company</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="{{asset('css/landingPage.css')}}" rel="stylesheet">

    <style>
        .custom-input-group {
            width: 70%;
            max-width: 600px;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex: 1;
            min-height: 150px;
        }
        .footer-container h5 {
        font-weight: bold;
        text-align: justify;
        font-size: 1.5rem;
        }

        .footer-container p {
            font-size: 1rem;
            text-align: justify;
            color: grey;
        }

        .footer-right-container a {
            color: #000;
            text-decoration: none;
            transition: color 0.3s ease, text-decoration 0.3s ease;
        }

        .footer-right-container a:hover {
            color: #007bff;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h1>asdfasd</h1>
    <div class="container-fluid">
        @include('components.navbar')

        <div class="row">
            <div class="col-md-12 mt-5">
                <h2 class="text-center">Search Company</h2>
                <form class="form-inline" action="{{route('user.searchCompanies')}}" method="GET">
                    <div class="d-flex justify-content-center">
                        <div class="input-group custom-input-group">
                            <input type="search" name="search" class="form-control me-2" placeholder="Search Company" aria-label="Search">
                            <div class="input-group-append me-2">
                                <select name="filter" class="h-100" id="filter-group" style="border-color: var(--bs-primary)">
                                    <option value="x">Filter</option>
                                    <option value="name">Name</option>
                                    <option value="field">Field</option>
                                </select>
                            </div>

                            <div class="input-group-append me-2">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger mt-3 text-center mx-auto" style="width: 40%;">
                    {{$errors->first('filter')}}
                </div>
            @endif
        </div>

        <div class="row justify-content-start mt-5 mx-4">
            <h2 class="text-center w-100 mt-5 mb-5">Companies</h2>
            @forelse ($companies as $company)
                <div class="col-6 col-sm-4 col-md-3 mb-4"> 
                    <div class="card h-100 d-flex flex-column">
                        <img src="..." class="card-img-top img-fluid" alt="...">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title fs-5 fs-md-4">{{ $company->name }}</h5>
                            <p class="card-text fs-6 fs-md-5 text-left">{{ $company->field }}</p>
                            <a href="#" class="btn btn-primary mt-auto">See Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger w-50 mx-auto text-center">
                    No company found.
                </div>
            @endforelse
        </div>

        <div class="row mb-5 mt-3 d-flex justify-content-center">
            <div class="col-12 d-flex justify-content-center">
                {{ $companies->links() }}
            </div>
        </div>
    
    </div>
    @include('components.footer')    
    <script src="{{asset('bootstrap/js/bootstramp.min.js')}}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>