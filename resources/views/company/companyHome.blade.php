
@extends('layouts.app')

@section('title', 'Company Home')

@section('custom_css')
    <link href="{{ asset('css/homeCompany.css') }}" rel="stylesheet">
@endsection

@section('content')
    @include('components.navbar')

    <section class="" style="background-color:#c0dcf7;">
        <div class="row px-4 py-3 mx-3">
            <div class="col-12 m-3">
                <h2 class="fw-bold text-center text-md-start" style="color: #682b90">Welcome back, {{Auth::user()->name}}!</h2>
                <h5 class="text-center text-md-start fw-bold">Here's your recruitment performance overview. Let's check out how your listings are doing.</h5>
                <div class="row d-md-flex border border-3">
                    <div class="col-md-8 m-auto p-4 text-start mx-0">
                        <h4 class="fw-bold">Total Job Listings: <span style="color: #7869cd">{{number_format($data['active_jobs'])}} Active Positions</span></h4>
                        <h4 class="fw-bold">Total Applicants: <span style="color: #7869cd">{{number_format($data['total_applicant'])}}</span></h4>
                        <h4 class="fw-bold">Applicants This Month: <span style="color: #7869cd">{{number_format($data['month_application'])}}</span></h4>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center justify-content-md-end">
                        <img class="img-fluid" src="{{asset('assets/companyPerformance.png')}}" style="width: 231px">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="hidden">
        <div class="row px-4 py-3 m-3 hidden">
            <div class="col-12">
                <h3 class="fw-bold">Manage Your Workflow</h3>
            </div>
            <div class="d-flex overflow-x-auto">

                <div class="col-12 col-md-6 text-center d-flex flex-column">
                    <div class="card m-3 p-4 flex-fill">
                        <img class="card-img-top mx-auto mb-3" src="{{asset('assets/newJob.png')}}" style="max-width: 200px">
                        <h2 class="card-title fw-bold" style="color: #682b90">Job Listing</h5>
                        <p class="card-text text-muted">Ready to create a new job posting head over to new job application.</p>
                        <a href="{{route('company.listJob')}}" class="btn btn-outline-primary m-4 rounded-pill mt-auto">Create New Job</a>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-center d-flex flex-column">
                    <div class="card m-3 p-4 flex-fill">
                        <img class="card-img-top mx-auto mb-3" src="{{asset('assets/companyProfileJob.jpg')}}" style="max-width: 200px">
                        <h2 class="card-title fw-bold" style="color: #682b90">Company Profile</h5>
                        <p class="card-text text-muted">Update any company details such as address, description, and others.</p>
                        <a href="{{route('company.profile')}}" class="btn btn-outline-primary m-4 rounded-pill mt-auto">Edit Company Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hidden">
        <div class="row px-4 py-3 m-3 hidden">
            <div class="col-12">
                <h3 class="fw-bold">Recent Job Listing</h3>
                <div class="row">
                    @forelse ($data['recent_job'] as $job)
                        <div class="col-12">
                            <div class="card m-3 p-4 d-flex flex-column flex-md-row align-items-center">
                                <img class="card-img-top mx-auto p-3 mb-3" alt="image" src="{{asset('assets/joblistImagePlaceHolder.jpeg')}}" style="width:300px;">

                                <div class="card-body text-start" style="max-width: 100%;">
                                    <div class="btn btn-sm btn-outline-danger rounded-pill mb-2" style="width: 80px; pointer-events:none" alt="status job">
                                        @if ($job->is_active == true)
                                            Open
                                        @else
                                            Closed
                                        @endif
                                    </div>
                                    <h3 class="card-title fw-bold text-start" style="color: #682b90">{{$job->title}}</h3>
                                    <p class="card-text text-muted text-start" style="max-width: 100%" alt="job description">{{$job->description}}</p>
                                    <p><strong>Total Applicant: </strong> {{$job->applicants->count()}}</p>
                                    <a href="{{route('company.job', ['job' => $job])}}" class="btn btn-primary">See Detail</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">
                            No recent job listing
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

        <a></a>
</main>
@include('components.footer')
@endsection

@section('custom_script')
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
