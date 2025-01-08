@extends('layouts.app')

@section('title', 'Companies')

@section('content')
    @include('components.navbar')

    <section style="background-color: #fff;">
        <div class="container">
            <div class="row pt-5 pb-5 d-flex justify-content-center">
                <div class="col-12 col-md-12 col-lg-7 text-center text-md-start mt-4">
                    <img src="{{ asset('assets/test222.jpg') }}" class="img-fluid" alt="Company Image"
                        style="max-width: 85%; height: auto;" />
                </div>

                <div class="col-12 col-md-12 col-lg-5 mt-5 text-center text-md-start">
                    <p class="fw-bold" style="color: gray; font-size: 1.1rem;">
                        {{__('lang.exploreConnect')}} <strong> {{__('lang.500+')}}</strong>  {{__('lang.reputable')}}
                    </p>
                    <h2 class="fw-bold" style="color: #682b90; font-size: calc(1.5rem + 1vw);">
                        {{__('lang.discover')}} <span style="color: #7869cd;"> {{__('lang.ideal')}}</span>  {{__('lang.here')}}
                    </h2>
                    <p class="fw-semibold" style="color: gray; font-size: 1rem; line-height: 1.8; text-align: justify;">
                        {{__('lang.searchExplore')}}
                    </p>

                    <div class="mt-4 d-flex flex-column flex-md-row align-items-center gap-2">
                        <a href="{{route('user.editProfile')}}" class="btn btn-primary" style="padding: 0.5rem 1.5rem; font-size: 1.1rem;">
                            {{__('lang.updateProfile')}}
                        </a>

                        <a href="#companies" class="btn btn-secondary" style="padding: 0.5rem 1.5rem; font-size: 1.1rem;">
                            {{__('lang.exploreComp')}}
                        </a>
                    </div>

                    <p class="fw-bold mt-3" style="color: gray;"> {{__('lang.contact')}}</p>

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
            </div>
            <hr>
        </div>
    </section>

    <div class="container" id="companies">
        <div class="container">
            <h2 class="fw-bold text-center mt-5 mb-3"
                style="color: #682b90; font-size: calc(1.5rem + 1vw);">
                {{__('lang.searchYour')}}<span style="color: #7869cd;"> {{__('lang.dreamComp')}}</span>  {{__('lang.here')}}
            </h2>
            <form class="d-flex flex-column flex-md-row mb-5 justify-content-center" role="search"
                action="{{route('user.searchCompany')}}" method="GET">
                <input style="max-width: 500px" class="form-control mb-2 mb-md-0 me-md-2" name="search">
                <select name="filter" class="form-select form-select-sm mb-2 mb-md-0 me-md-2"
                    style="border-color: var(--bs-primary); width: 150px;" onchange="updatePlaceholder()">
                    <option value="name"> {{__('lang.companyName')}}</option>
                    <option value="field"> {{__('lang.field')}}</option>
                </select>
                <button class="btn btn-outline-success mb-2 mb-md-0" type="submit"> {{__('lang.search')}}</button>

                @if ($errors->any())
                    <div class="alert alert-danger mt-3 text-center mx-auto" style="width: 40%;">
                        {{ $errors->first('filter') }}</div>
                @endif
            </form>
        </div>

        <div class="row">
            @php
                $contents = collect(Storage::disk('google')->listContents('/', true));
            @endphp

            @forelse ($companies as $company)
                <div class="col-10 col-sm-6 col-md-6 col-lg-4 mt-3">
                    <div class="d-flex flex-column bg-light" style="border: 1px solid #ddd; border-radius: 15px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease;">
                        <div class="text-center">
                            @if($company->company_image != null && Storage::disk('google')->exists(Auth::user()->profile_picture))
                                @php
                                    $file = $contents->firstWhere('path', $company->company_image);
                                    $photo_url = $file ? "https://drive.google.com/thumbnail?id={$file['extraMetadata']['id']}" : asset('assets/default_profile_picture.jpg');
                                @endphp

                                <img src="{{$photo_url}}" alt="Company Logo" style="width: 100px; height: 100px; margin-bottom: 15px; border-radius: 50%;">
                            @else
                                <img src="{{asset('assets/default_profile_picture.jpg')}}" alt="Company Logo" style="width: 100px; height: 100px; margin-bottom: 15px; border-radius: 50%;">
                            @endif
                        </div>

                        <div class="company-details text-center">
                            <h5 class="mt-2" style="font-size: 1.5rem; font-weight: bold; color: #333;">{{$company->user_name}}</h5>
                            <p style="color: grey; font-size: 0.9rem;">{{$company->address}}</p>
                        </div>

                        <div class="mt-2" style="text-align: justify">
                            <p class="fw-bold mb-0"> {{__('lang.description')}}</p>
                            <p class="text-muted mt-0" style="height: 50px; overflow: hidden; text-overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">
                                {{$company->description}}...</p>

                            <p class="fw-bold mb-0"> {{__('lang.field')}}</p>
                            <p class="text-muted mt-0">{{ $company->field }}</p>
                        </div>

                        <a href="{{route('user.company', ['company_id' => $company->id])}}" class="bg-primary text-center mt-3 fw-bold text-light text-decoration-none border-0"
                            style="padding: 10px 20px; border-radius: 5px; font-size: 1rem; transition: all 0.3s ease-in-out;">
                            {{__('lang.Visit Company')}}
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-10">
                    <div class="alert alert-info text-center" role="alert">
                        {{__('lang.noComp')}}
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
@endsection

@section('custom_script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var filterGroup = document.querySelector('select[name="filter"]');
            var searchInput = document.querySelector('input[name="search"]');

            filterGroup.addEventListener('change', function () {
                switch (filterGroup.value) {
                    case 'name':
                        searchInput.placeholder = '{{__('lang.Search by Company Name')}}';
                        break;
                    case 'field':
                        searchInput.placeholder = '{{__('lang.Search by Field')}}';
                        break;
                    default:
                        searchInput.placeholder = 'Search';
                        break;
                }
            });

            searchInput.placeholder = filterGroup.value === 'name' ? '{{__('lang.Search by Company Name')}}' : '{{__('lang.Search by Field')}}';
        });
    </script>
@endsection
