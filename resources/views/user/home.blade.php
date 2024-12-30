@extends('layouts.app')

@section('title', 'Home')
@section('custom_css')
    <style>
        .bannerText p {
            font-size: 1.7rem;
        }

        @media (max-width: 894px) {
            .bannerText p {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .bannerText p {
                font-size: 1.1rem;
            }
        }
    </style>
@endsection

@section('content')
    @include('components.navbar')

    @if (Auth::user()->role == 'applier')
        <div class="position-relative">
            <img src="{{asset('assets/tesBannerUser.jpeg')}}" alt="Company Cover" class="img-fluid w-100" style="object-fit: cover; height: 35vh;">

            <div class="bannerText position-absolute top-50 start-50 translate-middle text-center text-white px-4">
                <p class="lead text-wrap fw-bold" style="font-weight: 600;">{{__ ('lang.unleash')}} <span style="color: #682b90;">{{__('lang.moto')}}</span> {{__('lang.dreamJob')}}</p>
            </div>
        </div>

        <div class="container mt-5">
            <h3 class="container-title mb-4" style="font-size: 1.8rem; color: #192A51; font-weight: 700;">
                {{__ ('lang.curActive')}} <span style="color: #682b90">{{__ ('lang.jobApplications')}}</span>
            </h3>

            <div class="row align-items-stretch">
                @forelse ($jobApplications as $jobVacancy)
                    <div class="col-sm-6 col-md-4 mb-4">
                        <div class="card job-card shadow-sm rounded-3 h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title fw-bold mb-2 text-primary">{{ $jobVacancy->name }}</h5>
                                    <span class="badge bg-secondary text-light">{{ $jobVacancy->status }}</span>
                                </div>
                                <p class="card-text text-muted mb-2 fw-bold">{{ $jobVacancy->title }}</p>

                                <p class="card-text text-muted">
                                    <small>{{__ ('lang.applied')}} {{ $jobVacancy->created_at }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-muted text-center">{{__ ('lang.noJob')}}</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mb-4">
                <a href="{{route('user.jobVacancies')}}" class="btn btn-primary" style="background-color: #682b90; border-color: #682b90;">
                    {{__ ('lang.showAllJob')}}
                </a>
            </div>
            <hr>
        </div>
    @endif

    <div class="container mt-4">
        <h3 class="container-title mb-4" style="font-size: 1.8rem; color: #192A51; font-weight: 700;">{{__ ('lang.your')}} <span style="color: #682b90">{{__ ('lang.profile')}}</span></h3>
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center mb-4">
                    <div class="col-12 col-md-3 mb-2 d-flex justify-content-center">
                        @if ($applier->user->profile_picture != null && File::exists(public_path('upload/profile_picture/' . $applier->user->profile_picture)))
                            <img src="{{asset('upload/profile_picture/' . $applier->user->profile_picture)}}" alt="Profile Image" class="profile-image" style="width: 170px; height: 170px; object-fit: cover; border-radius: 50%;">
                        @else
                            <img src="{{asset('assets/default_profile_picture.jpg')}}" alt="Profile Image" class="profile-image" style="width: 170px; height: 170px; object-fit: cover; border-radius: 50%;">
                        @endif
                    </div>

                    <div class="col-12 col-md-7 ms-3">
                        <h3 class="card-title mb-2">{{$applier->user->name}}</h3>
                        <p class="section-description" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">{{$applier->headline}}</p>
                        @if (Auth::user()->role == 'applier')
                            @if ($applier->end_date_premium > now())
                                <div class="alert alert-success rounded-pill p-2 text-center" style="width:20%; min-width: 85px; max-width: 100px;">
                                {{__ ('lang.premium')}}
                                </div>
                            @endif
                            <a href="{{route ('user.updateProfile')}}" class="btn btn-outline-success">{{__ ('lang.editProfile')}}</a>

                            @if ($applier->cv_url != null && File::exists(public_path('upload/applier/CV/' . $applier->cv_url)))
                                <a href="{{asset('upload/applier/CV/' . $applier->cv_url)}}" class="btn btn-outline-primary" target="_blank" style="width: 10%; max-width: 150px;min-width: 90px;">{{__('lang.View CV')}}</a>
                            @endif
                        @endif
                    </div>
                </div>

                <ul class="nav nav-tabs mb-4" id="companyTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="fs-5 nav-link active fw-bold" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab">{{__ ('lang.aboutMe')}}</button>
                    </li>
                </ul>

                <div class="tab-content" id="companyTabContent">
                    <h4 class="section-title mb-3" style="font-size: 1.5rem; color: #192a51; font-weight: 600;">{{__ ('lang.description')}}</h4>
                    <p style="text-align: justify">{{$applier->description}}</p>
                    <hr>
                    <h4 class="section-title mb-3" style="font-size: 1.5rem; color: #192a51; font-weight: 600;">{{__ ('lang.personalInfo')}}</h4>
                    <p><strong>{{__ ('lang.email')}} </strong>{{$applier->user->email}}</p>
                    <p><strong>{{__ ('lang.phoneNumber')}}  </strong>{{$applier->user->phone_number}}</p>
                    <p><strong>{{__ ('lang.address')}} </strong>{{$applier->address}}</p>
                    <p><strong>{{__ ('lang.birthDate')}} </strong>{{\Carbon\Carbon::parse($applier->birth_date)->format('d F Y')}}</p>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <ul class="nav nav-tabs mb-4" id="companyTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="fs-5 title nav-link active fw-bold" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab">{{__ ('lang.education')}}</button>
                    </li>
                </ul>

                @forelse ($applier->educations as $education)
                    <div class="d-md-flex align-items-center mb-2">
                        <div class="col-12 col-md-7 ms-3">
                            <h4 class="card-title mb-2">{{$education->institution_name	}}</h4>
                            <p class="section-description mb-0" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">{{$education->degree}} | {{$education->field_of_study}}</p>
                            <p class="section-description mb-0" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">
                                {{\Carbon\Carbon::parse($education->start_date)->format('M Y')}} - {{\Carbon\Carbon::parse($education->end_date)->format('M Y')}}
                            </p>
                            <p class="section-description mb-2" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">
                                Grade: {{$education->grade}} / {{$education->max_grade}}
                            </p>
                        </div>
                    </div>

                    <div class="col-md-12 d-flex flex-column justify-content-center ms-3">
                        <h4 class="section-title mb-2" style="font-size: 1.5rem; color: #192a51; font-weight: 600;">{{__ ('lang.description')}}</h4>
                        <p style="text-align: justify">{{$education->description}}</p>
                    </div>
                    <hr>
                @empty
                    <div class="alert alert-danger text-center">
                        {{__ ('lang.noEdu')}}
                    </div>
                @endforelse
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <ul class="nav nav-tabs mb-4" id="companyTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="fs-5 title nav-link active fw-bold" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab">{{__ ('lang.professionalExp')}}</button>
                    </li>
                </ul>

                @forelse ($applier->experiences as $experience)
                    <div class="d-md-flex align-items-center mb-2">
                        <div class="col-12 col-md-7 ms-3">
                            <h4 class="card-title mb-2">{{$experience->title}}</h4>
                            <p class="section-description mb-0" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">
                                {{$experience->company_name}} • {{$experience->job_type}}
                            </p>
                            <p class="section-description mb-0" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">
                                {{\Carbon\Carbon::parse($experience->start_date)->format('M Y')}} - {{\Carbon\Carbon::parse($experience->end_date)->format('M Y')}}
                            </p>
                            <p class="section-description mb-2" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">
                                {{$experience->address}}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex flex-column justify-content-center">
                        <h4 class="section-title mb-2" style="font-size: 1.5rem; color: #192a51; font-weight: 600;">{{__ ('lang.description')}}</h4>
                        <p style="text-align: justify">{{$experience->description}}</p>
                    </div>
                    <hr>
                @empty
                    <div class="alert alert-danger text-center">
                        {{__ ('lang.noExp')}}
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <hr class="mt-5">
    @include('components.footer')
@endsection
