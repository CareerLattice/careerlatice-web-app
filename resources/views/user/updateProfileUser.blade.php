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
                            <button class="fs-5 title nav-link active fw-bold" id="personal-info-tab" data-bs-toggle="tab" data-bs-target="#personal-info" type="button" role="tab">Personal Information</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="fs-5 title nav-link fw-bold" id="education-tab" data-bs-toggle="tab" data-bs-target="#education" type="button" role="tab">Education</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="fs-5 title nav-link fw-bold" id="experience-tab" data-bs-toggle="tab" data-bs-target="#experience" type="button" role="tab">Professional Experience</button>
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
                                            Grade: {{$education->grade}} of {{$education->max_grade}}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12 d-flex flex-column justify-content-center ms-3">
                                    <h4 class="section-title mb-2" style="font-size: 1.5rem; color: #192a51; font-weight: 600;">Description</h4>
                                    <p style="text-align: justify">{{$education->description}}</p>
                                </div>

                                <button class="btn btn-warning btn-custom ms-3"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editEducation"
                                    data-institute="{{$education->institution_name}}"
                                    data-degrees="{{$education->degree}}"
                                    data-field_study="{{$education->field_of_study}}"
                                    data-grades="{{$education->grade}}"
                                    data-max_grades="{{$education->max_grade}}"
                                    data-description="{{$education->description}}">Edit</button>
                                <button class="btn btn-danger btn-custom" id="del">Delete</button>
                                <hr>
                            @empty
                                <div class="alert alert-danger">
                                    No Education Yet
                                </div>
                            @endforelse

                            <div class="mb-3 d-flex justify-content-center">
                                <button class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#addEducationModal">Add Education</button>
                            </div>
                        </div>

                        <!-- Professional Experience Tab -->
                        <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                            @forelse ($applier->experiences as $experience)
                                <div class="d-md-flex align-items-center mb-4">
                                    <div class="col-12 col-md-2 mb-2 d-flex justify-content-center">
                                        <img src="{{Storage::url($experience->company_picture)}}" alt="Profile Image" class="profile-image">
                                    </div>
                                    <div class="col-12 col-md-7 ms-3">
                                        <h4 class="card-title mb-2">{{$experience->title}}</h4>
                                        <p class="section-description mb-0" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">
                                            {{$experience->company_name}} • {{$experience->job_type}}
                                        </p>
                                        <p class="section-description mb-0" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">
                                            {{\Carbon\Carbon::parse($education->start_date)->format('M Y')}} - {{\Carbon\Carbon::parse($education->end_date)->format('M Y')}}
                                        </p>
                                        <p class="section-description mb-2" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">
                                            {{$experience->address}}
                                        </p>

                                        <button class="btn btn-warning btn-custom" id="#editExperience" data-bs-toggle="modal" data-bs-target="#editExperience">Edit</button>
                                        <button class="btn btn-danger btn-custom" id="del">Delete</button>
                                    </div>
                                </div>

                                <div class="col-md-12 d-flex flex-column justify-content-center">
                                    <h4 class="section-title mb-2" style="font-size: 1.5rem; color: #192a51; font-weight: 600;">Description</h4>
                                    <p style="text-align: justify">{{$experience->description}}</p>
                                </div>
                                <hr>
                            @empty
                                <div class="alert alert-danger">
                                    No Experience Yet
                                </div>
                            @endforelse

                            <div class="mb-3 d-flex justify-content-center">
                                <button class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#addExperienceModal">Add Experience</button>
                            </div>
                        </div>

                        <div class="tab-pane fade show active" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
                            <div class="card shadow-sm p-4" style="border-radius: 10px; background-color: #f8f9fa;">
                                <div class="d-flex justify-content-center mb-3">
                                    <img src="{{Storage::url($applier->user->profile_picture)}}" alt="Profile Image" class="profile-image"
                                        style="width: 170px; height: 170px; object-fit: cover; border-radius: 50%; border: 3px solid #ffc107;">
                                </div>

                                <div class="text-center">
                                    <h4 class="fw-bold mb-2">{{$applier->user->name}}</h4>
                                    <p class="text-muted mb-4">{{$applier->headline}}</p>
                                </div>

                                <strong class="fs-5">Phone</strong><span class="mb-3">{{$applier->user->phone_number}}</span>
                                <strong class="fs-5">Address</strong>
                                <p style="text-align: justify;">{{$applier->address}}</p>

                                <strong class="fs-5">Description</strong>
                                <p style="text-align: justify;">{{$applier->description}}</p>
                                <strong class="fs-5">Birth Date </strong><span class="mb-3">{{\Carbon\Carbon::parse($applier->birth_date)->format('d F Y')}}</span>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-warning btn-custom mt-3 px-4" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                        Edit Profile
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
                    <h5 class="modal-title" id="addEducationModalLabel">Add Education</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('user.addEducation')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="institution" class="form-label">Institution</label>
                            <input type="text" class="form-control" id="institution" name="institution">
                        </div>

                        <div class="mb-3">
                            <label for="degree" class="form-label">Degree</label>
                            <input type="text" class="form-control" id="degree" name="degree">
                        </div>

                        <div class="mb-3">
                            <label for="field" class="form-label">Field of Study</label>
                            <input type="text" class="form-control" id="field" name="field">
                        </div>

                        <div class="mb-3">
                            <label for="grade" class="form-label">Grade</label>
                            <input type="number" class="form-control" id="grade" name="grade" min="0" step="0.01">
                        </div>

                        <div class="mb-3">
                            <label for="max_grade" class="form-label">Max Grade</label>
                            <input type="number" class="form-control" id="max_grade" name="max_grade" min="0" step="0.01">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editEducation" tabindex="-3" aria-labelledby="editEducation" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEducationModalLabel">Edit Education</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="test" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="institute" class="form-label">Institution</label>
                            <input type="text" class="form-control" id="institute" name="institution" value="">
                        </div>

                        <div class="mb-3">
                            <label for="degrees" class="form-label">Degree</label>
                            <input type="text" class="form-control" id="degrees" name="degree" value="{{$education->degree}}">
                        </div>

                        <div class="mb-3">
                            <label for="field_study" class="form-label">Field of Study</label>
                            <input type="text" class="form-control" id="field_study" name="field_study" value="{{$education->field_of_study}}">
                        </div>

                        <div class="mb-3">
                            <label for="grades" class="form-label">Grade</label>
                            <input type="number" class="form-control" id="grades" name="grade" min="0" step="0.01"  value="{{$education->grade}}">
                        </div>

                        <div class="mb-3">
                            <label for="max_grades" class="form-label">Max Grade</label>
                            <input type="number" class="form-control" id="max_grades" name="max_grade" min="0" step="0.01" value="{{$education->max_grade}}">
                        </div>

                        <div class="mb-3">
                            <label for="edit_education_description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit_education_description" name="description" rows="4">{{$education->description}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addExperienceModal" tabindex="-1" aria-labelledby="addExperienceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExperienceModalLabel">Add Professional Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('user.addExperience')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="company" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="company" name="company">
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" class="form-control" id="position" name="position">
                        </div>

                        <div class="mb-3">
                            <label for="job_type" class="form-label">Job Type</label>
                            <select name="job_type" id="job_type">
                                <option value="Full-time">Full-time</option>
                                <option value="Part-time">Part-time</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="experience_address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="experience_address" name="address">
                        </div>

                        <div class="mb-3">
                            <label for="job_description" class="form-label">Job Description</label>
                            <textarea class="form-control" id="job_description" name="description" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('user.updateProfile')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$applier->user->name}}">
                        </div>

                        <div class="mb-3">
                            <label for="headline" class="form-label">Headline</label>
                            <input type="text" class="form-control" id="headline" name="headline" value="{{$applier->headline}}">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone_number" value="{{$applier->user->phone_number}}">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{$applier->address}}">
                        </div>

                        <div class="mb-3">
                            <label for="birthDate" class="form-label">Birth Date</label>
                            <input type="date" textarea class="form-control" id="birthDate" name="birth_date" value="{{\Carbon\Carbon::parse($applier->birth_date)->format('Y-m-d')}}">
                        </div>

                        <div class="mb-3">
                            <label for="edit_profile_description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit_profile_description" name="description" rows="4">{{$applier->description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Profile Picture</label>
                            <input type="file" textarea class="form-control" id="photo" name="profile_picture">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editExperience" tabindex="-3" aria-labelledby="editExperience" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editExperienceModalLabel">Edit Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="test" method="POST">
                        @csrf
                        
                    <div class="mb-3">
                        <label for="companyName" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="companyName" name="companyName" value="{{$experience->company_name}}">
                    </div>

                    <div class="mb-3">
                        <label for="jobTitle" class="form-label">Job Title</label>
                        <input type="text" class="form-control" id="jobTitle" name="jobTitle" placeholder="Enter job title">
                    </div>

                    <div class="mb-3">
                        <label for="edit_experience_description" class="form-label">Description</label>
                        <textarea class="form-control" id="edit_experience_description" name="description" placeholder="Describe your role and achievements" rows="4"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="startDate" name="startDate">
                    </div>

                    <div class="mb-3">
                        <label for="endDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="endDate" name="endDate">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="current" name="current">
                            <label class="form-check-label" for="current">I am currently working here</label>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a href="{{route('user.updateProfile')}}" class="btn btn-secondary">Cancel</a>
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
        document.querySelectorAll("#del").forEach((button) => {
            button.addEventListener("click", () => {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });
            });
        });

        $('#editEducation').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var institution_name = button.data('institute');
            var degree = button.data('degrees');
            var field_of_study = button.data('field_study');
            // var start_date = button.data('start_date');
            // var end_date = button.data('end_date');
            var grade = button.data('grades');
            var max_grade = button.data('max_grades');
            var description = button.data('description');

            // Populate the form fields
            $('#institute').val(institution_name);
            $('#degrees').val(degree);
            $('#field_study').val(field_of_study);
            // $('#start_date').val(start_date);
            // $('#end_date').val(end_date);
            $('#grades').val(grade);
            $('#max_grades').val(max_grade);
            $('#edit_education_description').val(description);
        });
    </script>
@endsection
