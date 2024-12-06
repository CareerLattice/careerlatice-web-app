
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
                <h2 class="fw-bold text-center text-md-start" style="color: #682b90">{{__('company/home.welcome')}} {{Auth::user()->name}}!</h2>
                <h5 class="text-center text-md-start fw-bold">{{__('company/home.caption')}}</h5>
                <div class="row d-md-flex border border-3">
                    <div class="col-md-8 m-auto p-4 text-start mx-0">
                        <h4 class="fw-bold">{{__('company/home.totalJobListing')}} <span style="color: #7869cd">{{number_format($data['active_jobs'])}} {{__('company/home.activePosition')}}</span></h4>
                        <h4 class="fw-bold">{{__('company/home.totalApplicants')}} <span style="color: #7869cd">{{number_format($data['total_applicant'])}}</span></h4>
                        <h4 class="fw-bold">{{__('company/home.applicantThisMonth')}} <span style="color: #7869cd">{{number_format($data['month_application'])}}</span></h4>
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
                <h3 class="fw-bold">{{__('company/home.contentTitle')}}</h3>
            </div>
            <div class="d-flex flex-wrap">

                <div class="col-12 col-md-6 text-center d-flex flex-column">
                    <div class="card m-3 p-4 flex-fill">
                        <img class="card-img-top mx-auto mb-3" src="{{asset('assets/newJob.png')}}" style="max-width: 200px">
                        <h2 class="card-title fw-bold" style="color: #682b90">{{__('company/home.jobListing')}}</h5>
                        <p class="card-text text-muted">{{__('company/home.jobListingDesc')}}</p>
                        <a href="{{route('company.listJob')}}" class="btn btn-outline-primary m-4 mt-auto">{{__('company/home.createNewJob')}}</a>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-center d-flex flex-column">
                    <div class="card m-3 p-4 flex-fill">
                        <img class="card-img-top mx-auto mb-3" src="{{asset('assets/companyProfileJob.jpg')}}" style="max-width: 200px">
                        <h2 class="card-title fw-bold" style="color: #682b90">{{__('company/home.companyProfile')}}</h5>
                        <p class="card-text text-muted">{{__('company/home.companyProfileDesc')}}</p>
                        <a href="{{route('company.profile')}}" class="btn btn-outline-primary m-4 mt-auto">{{__('company/home.editCompanyProfile')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hidden">
        <div class="row px-4 py-3 m-3 hidden">
            <div class="col-12">
                <h3 class="fw-bold">{{__('company/home.recentJob')}}</h3>
                <div class="row">
                    @forelse ($data['recent_job'] as $job)
                        <div class="col-12 my-3 shadow">
                            <div class="m-3 p-md-4 d-flex flex-column flex-md-row align-items-center">
                                <div>
                                    <img class="mx-auto p-3 mb-3" alt="image" src="{{asset('assets/joblistImagePlaceHolder.jpeg')}}" style="max-width: 300px;">
                                </div>

                                <div style="width:70%">
                                    <div class="btn btn-sm btn-outline-danger rounded-pill mb-2" style="width: 80px; pointer-events:none" alt="status job">
                                        @if ($job->is_active == true)
                                            {{__('company/home.open')}}
                                        @else
                                            {{__('company/home.closed')}}
                                        @endif
                                    </div>
                                    <h3 class="card-title fw-bold text-start" style="color: #682b90">{{$job->title}}</h3>
                                    <div>
                                        <p class="text-muted text-start text-truncate" alt="job description">{{$job->description}}</p>
                                    </div>
                                    <p><strong>{{__('company/home.totalApplicant')}} </strong> {{$job->applicants->count()}}</p>
                                    <a href="{{route('company.job', ['job' => $job])}}" class="btn btn-primary">{{__('company/home.seeDetail')}}</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">
                            {{__('company/home.noJobListing')}}
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')
@endsection

@section('custom_script')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
