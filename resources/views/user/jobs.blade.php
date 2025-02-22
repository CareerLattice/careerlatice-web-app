@extends('layouts.app')

@section('title', 'Jobs')

@section('content')
    @include('components.navbar')

    <section style="background-color: #fff;">
        <div class="container">
            <div class="row pt-5 pb-5 d-flex justify-content-center">

                <div class="col-12 col-md-12 col-lg-5 mt-5 text-center text-md-start">
                    <p class="fw-bold" style="color: gray; font-size: 1.1rem;">
                        {{__('lang.explore')}} <strong>{{__('lang.500+')}}</strong> {{__('lang.exciting')}}
                    </p>
                    <h2 class="fw-bold" style="color: #682b90; font-size: calc(1.5rem + 1vw);">
                        {{__('lang.launch')}} <span style="color: #7869cd;">{{__('lang.top')}}</span>
                    </h2>
                    <p class="fw-semibold" style="color: gray; font-size: 1rem; line-height: 1.8; text-align: justify">
                        {{__('lang.gain')}}
                    </p>

                    <div class="mt-4 d-flex flex-column flex-md-row align-items-center gap-2">
                        <a href="{{route('user.editProfile')}}" class="btn btn-primary" style="padding: 0.5rem 1.5rem; font-size: 1.1rem;">
                            {{__('lang.updateProfile')}}
                        </a>

                        <a href="#jobsSection" class="btn btn-secondary" style="padding: 0.5rem 1.5rem; font-size: 1.1rem;">
                            {{__('lang.exploreJob')}}
                        </a>
                    </div>

                    <p class="fw-bold mt-3" style="color: gray;">{{__('lang.contact')}}</p>

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
                <div class="col-12 col-md-12 col-lg-7 text-center text-md-start mt-4">
                    <img src="{{ asset('assets/11464491.jpg') }}" class="img-fluid" alt="Company Image" style="max-width: 85%; height: auto;" />
                </div>
            </div>
            <hr>
        </div>
    </section>



    <section id="jobsSection" style="overflow-x: hidden">
        <div class="container mt-5 text-center">
            <h1 class="fw-bold ">
                {{__('lang.discoverExciting')}} <span style="color: #682b90">{{__('lang.Job Vacancies')}}</span>
            </h1>
            <p class="fw-bold" style="color: #7869cd">
                {{__('lang.browse')}}
            </p>
        </div>

        <div class="container">
            <form class="d-flex flex-column flex-md-row mb-5 justify-content-center" role="search" action="{{route('user.searchJobs')}}" method="GET">
                <input style="width: 500px" class="form-control mb-2 mb-md-0 me-md-2" type="search" placeholder="Search by Company Name" aria-label="Search" name="search">

                <select name="filter" class="form-select form-select-sm mb-2 mb-md-0 me-md-2" id="filter-group" style="border-color: var(--bs-primary); width: 160px;" onchange="updatePlaceholder()">
                    <option value="name">{{__('lang.companyName')}}</option>
                    <option value="title">{{__('lang.jobTitle')}}</option>
                    <option value="job_type">{{__('lang.jobType')}}</option>
                </select>

                <button class="btn btn-outline-success mb-2 mb-md-0" type="submit">{{__('lang.search')}}</button>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger mt-3 text-center mx-auto" style="width: 40%;">
                    {{$errors->first('filter')}}
                </div>
            @endif
        </div>

        <div class="container d-flex flex-column align-items-center">
            <div class="row" style="width: 100%; max-width: 1000px;">
                @php
                    $contents = collect(Storage::disk('google')->listContents('/', true));
                @endphp

                @forelse ($jobs as $job)
                    <div class="card mb-3" style="width: 100%;">
                        <div class="row g-0 d-flex justify-content-center">
                            <div class="col-12 col-sm-10 col-md-4 mt-3">
                                @php
                                    $file = $contents->firstWhere('path', $job->job_picture);
                                    $job_url = $file ? "https://drive.google.com/thumbnail?id={$file['extraMetadata']['id']}" : asset('assets/default_job_picture.jpg');
                                @endphp
                                <img src="{{$job_url}}" class="img-fluid rounded-start" alt="Job Photo" style="height: 100%; object-fit: contain;">
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="card-body p-3">
                                    <h5 class="card-title fs-4 fw-bold" style="text-align: left; margin-bottom: 0.5rem; color: #682b90">{{$job->title}}</h5>
                                    <p class="card-text text-dark mb-1" style="text-align: justify; font-size: 1rem;">{{$job->company_name}}</p>
                                    <p class="card-text mb-1" style="text-align: justify; color: gray; font-size: 0.9rem;">{{$job->address}} ({{$job->job_type}})</p>
                                    <p class="card-text mb-2" style="text-align: justify; font-size: 0.95rem;">{{$job->description}}</p>
                                    <p class="card-text mb-1 fw-bold mt-5" style="text-align: justify; font-size: 0.95rem;">Meet the hiring team <span class="text-primary"><strong>{{$job->person_in_charge}}</strong></span></p>
                                    <p class="card-text mb-0"><small class="text-body-secondary">Last updated {{$job->updated_at}}</small></p>

                                    <div class="mt-2 d-flex flex-column flex-md-row align-items-center gap-2">
                                        <a href="{{route('user.jobDetail', ['job' => $job->id])}}" class="btn btn-primary btn-lg w-100 w-md-auto d-flex justify-content-center align-items-center" style="padding: 0.5rem 1.5rem; font-size: 1.1rem;">
                                            {{__('lang.apply')}}
                                        </a>
                                        <a href="{{route('user.company', ['company_id' => $job->company_id])}}" class="btn btn-secondary btn-lg w-100 w-md-auto d-flex justify-content-center align-items-center" style="padding: 0.5rem 1.5rem; font-size: 1.1rem;">
                                            {{__('lang.viewComp')}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger">
                        {{__('company/userJobs.noJob')}}
                    </div>
                @endforelse
            </div>
            {{$jobs->links()}}
        </div>
        <hr class="mt-5">
    </section>

    @include('components.footer')
@endsection()

@section('custom_script')
    <script>
        function updatePlaceholder() {
            var selectedValue = document.getElementById('filter-group').value;
            var searchInput = document.querySelector('input[name="search"]');

            switch (selectedValue) {
                case 'name':
                    searchInput.placeholder = 'Search by Company Name';
                    break;
                case 'title':
                    searchInput.placeholder = 'Search by Job Title';
                    break;
                case 'job_type':
                    searchInput.placeholder = 'ex: Full-time, Part-time, Internship, or Freelance';
                    break;
            }
        }
    </script>
@endsection
