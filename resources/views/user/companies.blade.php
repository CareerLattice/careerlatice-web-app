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
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
        }

        .company-card {
            border: 1px solid #ddd;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: flex-start;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            flex-direction: column;
        }

        .company-card:hover {
            transform: translateY(-10px);
        }

        .company-card img {
            width: 100px;
            height: 100px;
            margin-bottom: 15px;
            border-radius: 50%;
            align-self: center;
        }

        .company-details {
            flex: 1;
            text-align: center;
        }

        .company-details h5 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .company-details p {
            margin: 5px 0;
            color: grey;
            font-size: 0.95rem;
        }

        .ratings span {
            font-size: 1.1rem;
            margin-right: 5px;
        }

        .ratings i {
            color: #ffc107;
        }

        .stats {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .stat-item span {
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
        }

        .stat-item small {
            color: grey;
        }

        .btn-visit {
            width: 100%;
            margin-top: 15px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-visit:hover {
            background-color: #0056b3;
            text-decoration: none;
        }

        .company-info-section {
            margin-top: 15px;
            text-align: justify;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        @include('components.navbar')

        <div class="container">
            <h1 class="text-center mt-5 mb-3">Search Company</h1>
            <form class="d-flex flex-column flex-md-row mb-5 justify-content-center" role="search" action="{{route('user.searchCompany')}}" method="GET">
                <!-- Search Input -->
                <input style="width: 500px" class="form-control mb-2 mb-md-0 me-md-2" type="search" placeholder="Search Company" aria-label="Search" name="search" required>
                
                <!-- Select Filter with smaller width -->
                <select name="filter" class="form-select form-select-sm mb-2 mb-md-0 me-md-2" id="filter-group" style="border-color: var(--bs-primary); width: 150px;">
                    <option value="x">Filter</option>
                    <option value="name">Company Name</option>
                    <option value="field">Field</option>
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

        <h1 class="text-center w-100 mt-5 mb-5">Companies</h1>

        <div class="row">
            @for ($i = 0; $i < 6; $i++)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mx-auto">
                    <div class="company-card">
                        <div class="row">
                            <div class="col-md-4 d-flex justify-content-center">
                                <img src="{{ asset('assets/bbca.jpeg') }}" alt="Amazon Logo" style="width: 100px; height: 100px;">
                            </div>
                            
                            <div class="col-md-8">
                                <h5 class="mt-2 fw-bold">Bank Central Asia</h5>
                                <p class="mb-0">Menara BCA Grand Indonesia, Jl. M.H. Thamrin No.1, Menteng, Jakarta 10310</p>
                            </div>
                        </div>

                        <div class="company-info-section">
                            <p class="fw-bold mb-0">Description</p>
                            <p class="text-muted mt-0" style="font-size: 0.9rem;">
                                Bank Central Asia is one of the leading banks in Indonesia. With the vision of "to be the bank of choice and a major pillar of the Indonesian economy", BCA has continued to improve the quality of its products and services.
                            </p>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{route('jobCompany')}}" class="btn btn-visit">Visit Company</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        
        <div class="row mb-5 mt-3 d-flex justify-content-center">
            <div class="col-12 d-flex justify-content-center">
                {{ $companies->links() }}
            </div>
        </div>
    </div>

    <hr class="mt-5">

    @include('components.footer')    
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
