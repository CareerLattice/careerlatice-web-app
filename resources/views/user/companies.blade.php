
@extends('layout.master')

@section('content')
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
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        height: 100%;
    }
    .company-card:hover {
        transform: translateY(-10px);
    }
    .company-card img {
        width: 100px;
        height: 100px;
        margin-bottom: 15px;
        border-radius: 50%;
    }
    .company-details h5 {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
        text-align: center;
    }
    .company-details p {
        color: grey;
        font-size: 0.9rem;
        text-align: center;
    }
    .btn-visit {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        font-size: 1rem;
        transition: all 0.3s ease-in-out;
    }
    .btn-visit:hover {
        background-color: #0056b3;
        transform: scale(1.05);
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15);
    }
    .company-info-section {
        margin-top: 15px;
        text-align: justify;
    }
    .company-info-section .description {
        height: 50px;
        overflow: hidden;
        text-overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
    }
</style>
    @include('components.navbar')
    <div class="container">
        <div class="container">
            <h2 class="fw-bold text-center mt-5 mb-3" style="color: #682b90; font-size: calc(1.5rem + 1vw);">
                Search your <span style="color: #7869cd;">Dream Companies</span> here
            </h2>
            <form class="d-flex flex-column flex-md-row mb-5 justify-content-center" role="search" action="{{route('user.searchCompany')}}" method="GET">
                <input style="max-width: 500px" class="form-control mb-2 mb-md-0 me-md-2" name="search">
                <select name="filter" class="form-select form-select-sm mb-2 mb-md-0 me-md-2" id="filter-group" style="border-color: var(--bs-primary); width: 150px;">
                    <option value="name">Company Name</option>
                    <option value="field">Field</option>
                </select>
                <button class="btn btn-outline-success mb-2 mb-md-0" type="submit">Search</button>

                @if ($errors->any())
                    <div class="alert alert-danger mt-3 text-center mx-auto" style="width: 40%;">{{$errors->first('filter')}}</div>
                @endif
            </form>
        </div>

        <hr>

        <div class="row">
            @forelse ($companies as $company)
                <div class="col-10 col-sm-6 col-md-6 col-lg-4 mt-3">
                    <div class="company-card">
                        <img src="{{ asset('assets/bbca.jpeg') }}" alt="Company Logo">
                        <div class="company-details">
                            <h5 class="mt-2">{{$company->user_name}}</h5>
                            <p>{{$company->address}}</p>
                        </div>
                        <div class="company-info-section">
                            <p class="fw-bold mb-0">Description</p>
                            <p class="text-muted mt-0 description">{{$company->description}}...</p>
                            <p class="fw-bold mb-0">Field</p>
                            <p class="text-muted mt-0">{{$company->field}}</p>
                        </div>
                        <a href="{{route('user.company', ['company_id' => $company->id])}}" class="btn btn-visit">Visit Company</a>
                    </div>
                </div>
            @empty
                <div class="col-10">
                    <div class="alert alert-info text-center" role="alert">
                        No companies found.
                    </div>
                </div>
            @endforelse
        </div>

        <div class="row mb-5 mt-3 d-flex justify-content-center">
            <div class="col-12 d-flex justify-content-center">
                {{ $companies->links() }}
            </div>
        </div>
    </div>


<hr class="mt-5">
@include('components.footer')
@endsection()
