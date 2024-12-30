@extends('layouts.app')

@section('custom_css')
    <style>
        .profile-image {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
@endsection

@section('content')
    @include('components.navbar')
    <div class="container py-5">
        <div class="row">
            <div class="card mt-3 d-flex flex-column">
                <div class="card-body">
                    <ul class="nav nav-tabs mb-4" id="profileTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="fs-5 title nav-link active fw-bold" id="personal-info-tab" data-bs-toggle="tab" data-bs-target="#personal-info" type="button" role="tab">{{__('lang.personalInfo')}}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="fs-5 title nav-link fw-bold" id="education-tab" data-bs-toggle="tab" data-bs-target="#education" type="button" role="tab">{{__('lang.education')}}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="fs-5 title nav-link fw-bold" id="experience-tab" data-bs-toggle="tab" data-bs-target="#experience" type="button" role="tab">{{__('lang.proExp')}}</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="educationContent">
                        <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                            @forelse ($applier->educations as $education)
                                <div class="d-md-flex align-items-center mb-2">
                                    <div class="col-12 col-md-7 ms-3">
                                        <h4 class="card-title mb-2">{{$education->institution_name}}</h4>
                                        <p class="section-description mb-0" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">
                                            {{$education->degree}}, {{$education->field_of_study}}
                                        </p>
                                        <p class="section-description mb-0" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">
                                            {{\Carbon\Carbon::parse($education->start_date)->format('M Y')}} - {{\Carbon\Carbon::parse($education->end_date)->format('M Y')}}
                                        </p>
                                        <p class="section-description mb-2" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">
                                            {{__('lang.grade')}} {{$education->grade}} of {{$education->max_grade}}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12 d-flex flex-column justify-content-center ms-3">
                                    <h4 class="section-title mb-2" style="font-size: 1.5rem; color: #192a51; font-weight: 600;">{{__('lang.description')}}</h4>
                                    <p style="text-align: justify">{{$education->description}}</p>
                                </div>

                                <div class="d-flex gap-2">
                                    <button class="btn btn-warning btn-custom ms-3"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editEducation"
                                        data-institute="{{$education->institution_name}}"
                                        data-degree="{{$education->degree}}"
                                        data-field_study="{{$education->field_of_study}}"
                                        data-grade="{{$education->grade}}"
                                        data-max_grade="{{$education->max_grade}}"
                                        data-description="{{$education->description}}"
                                        data-start-date="{{\Carbon\Carbon::parse($education->start_date)->format('Y-m-d')}}"
                                        data-end-date="{{\Carbon\Carbon::parse($education->end_date)->format('Y-m-d')}}"
                                        data-route = "{{route('user.updateEducation', ['education' => $education->id])}}">
                                        {{__('lang.edit')}}
                                    </button>

                                    <form action="{{route('user.deleteEducation', $education->id)}}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger delete-btn" type="button">{{__('lang.del')}}</button>
                                    </form>
                                </div>
                                <hr>
                            @empty
                                <div class="alert alert-danger">
                                {{__('lang.noEdu')}}
                                </div>
                            @endforelse

                            <div class="mb-3 d-flex justify-content-center">
                                <button class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#addEducationModal">{{__('lang.addEdu')}}</button>
                            </div>
                        </div>

                        <!-- Professional Experience Tab -->
                        <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                            @forelse ($applier->experiences as $experience)
                                <div class="d-md-flex align-items-center mb-4">
                                    <div class="col-12 col-md-2 mb-2 d-flex justify-content-center">
                                        <img src="{{asset('upload/profile_picture/' . $experience->company_picture)}}" alt="Profile Image" class="profile-image">
                                    </div>
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

                                        <div class="d-flex gap-2">
                                            <button class="btn btn-warning btn-custom" id="#editExperience" data-bs-toggle="modal" data-bs-target="#editExperience"
                                                data-company="{{$experience->company_name}}"
                                                data-job-title = "{{$experience->title}}"
                                                data-exp-description="{{$experience->description}}"
                                                data-start-date = "{{\Carbon\Carbon::parse($experience->start_date)->format('Y-m-d')}}"
                                                data-end-date = "{{\Carbon\Carbon::parse($experience->end_date)->format('Y-m-d')}}"
                                                data-route = "{{route('user.updateExperience', $experience->id)}}">
                                                {{__('lang.edit')}}
                                            </button>

                                            <form action="{{route('user.deleteExperience', $experience->id)}}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger delete-btn" type="button">{{__('lang.del')}}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 d-flex flex-column justify-content-center">
                                    <h4 class="section-title mb-2" style="font-size: 1.5rem; color: #192a51; font-weight: 600;">{{__('lang.description')}}</h4>
                                    <p style="text-align: justify">{{$experience->description}}</p>
                                </div>
                                <hr>
                            @empty
                                <div class="alert alert-danger">
                                {{__('lang.noExp')}}
                                </div>
                            @endforelse

                            <div class="mb-3 d-flex justify-content-center">
                                <button class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#addExperienceModal">{{__('lang.addExp')}}</button>
                            </div>
                        </div>

                        <div class="tab-pane fade show active" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
                            <div class="card shadow-sm p-4" style="border-radius: 10px; background-color: #f8f9fa;">
                                <div class="d-flex justify-content-center mb-3">
                                    @php
                                        $contents = collect(Storage::disk('google')->listContents('/', true));
                                        $file = $contents->firstWhere('path', Auth::user()->profile_picture);
                                        
                                        if ($file) {
                                            $photo_url = "https://drive.google.com/thumbnail?id={$file['extraMetadata']['id']}";
                                        } else {
                                            $photo_url = asset('assets/default_profile_picture.jpg');
                                        }
                                    @endphp
                                    
                                    @if ($applier->user->profile_picture == null || !Storage::disk('google')->exists(Auth::user()->profile_picture))
                                        <img src="{{asset('assets/default_profile_picture.jpg')}}" alt="Profile Image" class="profile-image" style="width: 170px; height: 170px; object-fit: cover; border-radius: 50%; border: 3px solid #ffc107;">
                                    @else
                                        <img src="{{$photo_url}}" alt="Profile Image" class="profile-image" style="width: 170px; height: 170px; object-fit: cover; border-radius: 50%; border: 3px solid #ffc107;">
                                    @endif
                                </div>

                                <div class="text-center">
                                    <h4 class="fw-bold mb-2">{{$applier->user->name}}</h4>
                                    <p class="text-muted mb-4">{{$applier->headline}}</p>
                                </div>

                                <strong class="fs-5">{{__('lang.phone')}}</strong><span class="mb-3">{{$applier->user->phone_number}}</span>
                                <strong class="fs-5">{{__('lang.address')}}</strong>

                                @if ($applier->address == null)
                                    <p class="text-muted">{{__('lang.There is no address yet')}}</p>
                                @else
                                    <p style="text-align: justify;">{{$applier->address}}</p>
                                @endif

                                <strong class="fs-5">{{__('lang.description')}}</strong>
                                <p style="text-align: justify;">{{$applier->description}}</p>
                                <strong class="fs-5">{{__('lang.birthDate')}} </strong><span class="mb-3">{{\Carbon\Carbon::parse($applier->birth_date)->format('d F Y')}}</span>
                                <strong>{{__('lang.uploadCV')}}</strong>
                                @if ($applier->cv_url != null && File::exists(public_path('upload/applier/CV/' . $applier->cv_url)))
                                    <a href="{{asset('upload/applier/CV/' . $applier->cv_url)}}" class="btn btn-outline-primary" target="_blank" style="width: 15%; max-width: 100px;min-width: 90px;">{{__('lang.View CV')}}</a>
                                @else
                                    <p class="text-">{{__('lang.You have not upload CV yet')}}</p>
                                @endif

                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-warning btn-custom mt-3 px-4" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                        {{__('lang.editProfile')}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addEducationModal" tabindex="-3" aria-labelledby="addEducationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEducationModalLabel">{{__('lang.addEdu')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('user.addEducation')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="institution" class="form-label">{{__('lang.institute')}}</label>
                            <input type="text" class="form-control" id="institution" name="institution">
                        </div>

                        <div class="mb-3">
                            <label for="degree" class="form-label">{{__('lang.deg')}}</label>
                            <input type="text" class="form-control" id="degree" name="degree">
                        </div>

                        <div class="mb-3">
                            <label for="field" class="form-label">{{__('lang.fieldOfStudy')}}</label>
                            <input type="text" class="form-control" id="field" name="field">
                        </div>

                        <div class="mb-3">
                            <label for="startDate" class="form-label">{{__('lang.startDate')}}</label>
                            <input type="date" class="form-control" id="startDate" name="start_date">
                        </div>

                        <div class="mb-3">
                            <label for="endDate" class="form-label">{{__('lang.fieldOfStudy')}}</label>
                            <input type="date" class="form-control" id="endDate" name="end_date">
                        </div>

                        <div class="mb-3">
                            <label for="grade" class="form-label">{{__('lang.grade')}}</label>
                            <input type="number" class="form-control" id="grade" name="grade" min="0" step="0.01">
                        </div>

                        <div class="mb-3">
                            <label for="max_grade" class="form-label">{{__('lang.maxGrade')}}</label>
                            <input type="number" class="form-control" id="max_grade" name="max_grade" min="0" step="0.01">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">{{__('lang.description')}}</label>
                            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editEducation" tabindex="-1" aria-labelledby="editEducationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEducationLabel">{{__('lang.editEducation')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="editEducationForm">
                        @csrf
                        <div class="mb-3">
                            <label for="institute" class="form-label">{{__('lang.institute')}}</label>
                            <input type="text" class="form-control text-dark" id="institute" name="institution">
                        </div>

                        <div class="mb-3">
                            <label for="degrees" class="form-label">{{__('lang.deg')}}</label>
                            <input type="text" class="form-control" id="degrees" name="degree">
                        </div>

                    <div class="mb-3">
                        <label for="field_study" class="form-label">{{__('lang.fieldOfStudy')}}</label>
                        <input type="text" class="form-control" id="field_study" name="field_study">
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label">{{__('lang.startDate')}}</label>
                        <input type="date" textarea class="form-control" id="start_date" name="start_date" rows="4"></inputtextarea>

                    </div>

                    <div class="mb-3">
                        <label for="end_date" class="form-label">{{__('lang.endDate')}}</label>
                        <input type="date" textarea class="form-control" id="end_date" name="end_date" rows="4"></inputtextarea>
                    </div>

                        <div class="mb-3">
                            <label for="grades" class="form-label">{{__('lang.grade')}}</label>
                            <input type="number" class="form-control" id="grades" name="grade" min="0" step="0.01">
                        </div>

                        <div class="mb-3">
                            <label for="max_grades" class="form-label">{{__('lang.maxGrade')}}</label>
                            <input type="number" class="form-control" id="max_grades" name="max_grade" min="0" step="0.01">
                        </div>

                        <div class="mb-3">
                            <label for="edit_education_description" class="form-label">{{__('lang.description')}}</label>
                            <textarea class="form-control" id="edit_education_description" name="description" rows="4"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addExperienceModal" tabindex="-1" aria-labelledby="addExperienceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExperienceModalLabel">{{__('lang.addExp')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('user.addExperience')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="company" class="form-label">{{__('lang.compName')}}</label>
                            <input type="text" class="form-control" id="company" name="company">
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">{{__('lang.pos')}}</label>
                            <input type="text" class="form-control" id="position" name="position">
                        </div>

                        <div class="mb-3">
                            <label for="job_type" class="form-label">{{__('lang.jobType')}}</label>
                            <select name="job_type" id="job_type">
                                <option value="Full-time">{{__('lang.fullTimeCreateJob')}}</option>
                                <option value="Part-time">{{__('lang.partTimeCreateJob')}}</option>
                                <option value="Freelance">{{__('lang.freelance')}}</option>
                                <option value="Internship">{{__('lang.internshipCreateJob')}}</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="experience_address" class="form-label">{{__('lang.address')}}</label>
                            <input type="text" class="form-control" id="experience_address" name="address">
                        </div>

                        <div class="mb-3">
                            <label for="job_description" class="form-label">{{__('lang.jobDesc')}}</label>
                            <textarea class="form-control" id="job_description" name="description" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="start_date" class="form-label">{{__('lang.startDate')}}</label>
                            <input type="date" class="form-control" id="start_date" name="start_date">
                        </div>

                        <div class="mb-3">
                            <label for="end_date" class="form-label">{{__('lang.endDate')}}</label>
                            <input type="date" class="form-control" id="end_date" name="end_date">
                        </div>
                        <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">{{__('lang.editProfile')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('user.updateProfile')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">{{__('lang.Name')}}</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$applier->user->name}}">
                        </div>

                        <div class="mb-3">
                            <label for="headline" class="form-label">{{__('lang.headline')}}</label>
                            <input type="text" class="form-control" id="headline" name="headline" value="{{$applier->headline}}">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">{{__('lang.phone')}}</label>
                            <input type="text" class="form-control" id="phone" name="phone_number" value="{{$applier->user->phone_number}}">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">{{__('lang.address')}}</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{$applier->address}}">
                        </div>

                        <div class="mb-3">
                            <label for="birthDate" class="form-label">{{__('lang.birthDate')}}</label>
                            <input type="date" textarea class="form-control" id="birthDate" name="birth_date" value="{{\Carbon\Carbon::parse($applier->birth_date)->format('Y-m-d')}}">
                        </div>

                        <div class="mb-3">
                            <label for="edit_profile_description" class="form-label">{{__('lang.description')}}</label>
                            <textarea class="form-control" id="edit_profile_description" name="description" rows="4">{{$applier->description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">{{__('lang.profilePic')}}</label>
                            <input type="file" textarea class="form-control" id="photo" name="profile_picture">
                        </div>
                        <div class="mb-3">
                            <label for="cv" class="form-label">{{__('lang.cv')}}</label>
                            <input type="file" class="form-control" id="cv" name="cv">
                        </div>
                        <button type="submit" class="btn btn-primary">{{__('lang.saveChange')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editExperience" tabindex="-3" aria-labelledby="editExperience" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editExperienceModalLabel">{{__('lang.editExp')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="editExperienceForm">
                        @csrf
                        <div class="mb-3">
                            <label for="companyName" class="form-label">{{__('lang.compName')}}</label>
                            <input type="text" class="form-control" id="companyName" name="companyName">
                        </div>

                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">{{__('lang.jobTitle')}}</label>
                            <input type="text" class="form-control" id="jobTitle" name="job_title" placeholder="Enter job title">
                        </div>

                        <div class="mb-3">
                            <label for="edit_experience_description" class="form-label">{{__('lang.description')}}</label>
                            <textarea class="form-control" id="edit_experience_description" name="description" placeholder="Describe your role and achievements" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="startDate" class="form-label">{{__('lang.startDate')}}</label>
                            <input type="date" class="form-control" id="startDate" name="start_date">
                        </div>

                        <div class="mb-3">
                            <label for="endDate" class="form-label">{{__('lang.endDate')}}</label>
                            <input type="date" class="form-control" id="endDate" name="end_date">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">{{__('lang.saveChange')}}</button>
                            <a href="{{route('user.editProfile')}}" class="btn btn-secondary">{{__('lang.cancel')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
@endsection

@section('custom_script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".delete-btn").forEach((button) => {
                button.addEventListener("click", () => {
                    Swal.fire({
                        title: "{{__('lang.Are you sure?')}}",
                        text: "{{__('lang.You will not be able to revert this!')}}",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "{{__('lang.confirmButtonModal')}}",
                        cancelButtonText: "{{__('lang.cancelButtonTextModal')}}",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            button.closest(".delete-form").submit();
                        }
                    });
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('editEducation');
            const editEducationForm = document.getElementById('editEducationForm')
            modal.addEventListener('show.bs.modal', function(event){
                const button = event.relatedTarget;

                //Get Data from button
                const institute = button.getAttribute('data-institute')
                const degree = button.getAttribute('data-degree')
                const field_study = button.getAttribute('data-field_study')
                const grade = button.getAttribute('data-grade')
                const max_grade = button.getAttribute('data-max_grade')
                const description = button.getAttribute('data-description')
                const start_date = button.getAttribute('data-start-date')
                const end_date = button.getAttribute('data-end-date')
                const route = button.getAttribute('data-route')

                const insituteInput = modal.querySelector('#institute')
                const degreeInput = modal.querySelector('#degrees')
                const field_studyInput = modal.querySelector('#field_study')
                const gradesInput = modal.querySelector('#grades')
                const max_gradesInput = modal.querySelector('#max_grades')
                const edit_education_descriptionInput = modal.querySelector('#edit_education_description')
                const start_dateInput = modal.querySelector('#start_date')
                const end_dateInput = modal.querySelector('#end_date')

                //Update Input value
                insituteInput.value = institute
                degreeInput.value = degree
                field_studyInput.value = field_study
                gradesInput.value = grade
                max_gradesInput.value = max_grade
                edit_education_descriptionInput.value = description;
                start_dateInput.value = start_date
                end_dateInput.value = end_date

                editEducationForm.action = route;
            })
        })

        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('editExperience');
            const editExperienceForm = document.getElementById('editExperienceForm')
            modal.addEventListener('show.bs.modal', function(event){
                const button = event.relatedTarget;

                //Get Data from button
                const company = button.getAttribute('data-company')
                const jobTitle = button.getAttribute('data-job-title')
                const description = button.getAttribute('data-exp-description')
                const startDate = button.getAttribute('data-start-date')
                const endDate = button.getAttribute('data-end-date')
                const route = button.getAttribute('data-route')

                const companyInput = modal.querySelector('#companyName')
                const jobTitleInput = modal.querySelector('#jobTitle')
                const descriptionInput = modal.querySelector('#edit_experience_description')
                const startDateInput = modal.querySelector('#startDate')
                const endDateInput = modal.querySelector('#endDate')

                //Update Input value
                companyInput.value = company
                jobTitleInput.value = jobTitle
                descriptionInput.value = description
                startDateInput.value = startDate
                endDateInput.value = endDate
                console.log(route);

                editExperienceForm.action = route;
            })
        })
    </script>
@endsection
