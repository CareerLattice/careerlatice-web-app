@extends('layout.master')

@section('content')

<style>
    .d-flex {
        display: flex;
        flex-wrap: wrap;
    }

    .card {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .btn-custom {
        margin: 5px;
    }

    .profile-image {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
    }
</style>

<div class="container py-5">
    <div class="row">
        <div class="card mt-3">
            <div class="card-body">
                <ul class="nav nav-tabs mb-4" id="profileTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="fs-5 title nav-link active fw-bold" id="education-tab" data-bs-toggle="tab" data-bs-target="#education" type="button" role="tab">Education</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="fs-5 title nav-link fw-bold" id="experience-tab" data-bs-toggle="tab" data-bs-target="#experience" type="button" role="tab">Professional Experience</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="fs-5 title nav-link fw-bold" id="personal-info-tab" data-bs-toggle="tab" data-bs-target="#personal-info" type="button" role="tab">Personal Information</button>
                    </li>
                </ul>
                
        
                <div class="tab-content" id="profileTabContent">
                    <div class="tab-pane fade show active" id="education" role="tabpanel" aria-labelledby="education-tab">
                        @for($i = 0; $i < 2; $i++)
                            <div class="d-md-flex align-items-center mb-4">
                                <div class="col-12 col-md-2 mb-2 d-flex justify-content-center">
                                    <img src="{{asset('assets/companiesLogo.jpg')}}" alt="Profile Image" class="profile-image">
                                </div>
                                <div class="col-12 col-md-7 ms-3">
                                    <h4 class="card-title mb-2">Bina Nusantara University</h4>
                                    <p class="section-description mb-0" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">
                                        Bachelor's degree, Computer Science
                                    </p>
                                    <p class="section-description mb-0" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">
                                        Sept 2022 - Aug 2026
                                    </p>
                                    <p class="section-description mb-2" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">
                                        Grade: 3.78/4.00
                                    </p>
                                    <!-- Edit and Delete Buttons -->
                                    <a href="{{route('editEducation')}}"><button class="btn btn-warning btn-custom">Edit</button></a>
                                    <button class="btn btn-danger btn-custom">Delete</button>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex flex-column justify-content-center">
                                <h4 class="section-title mb-2" style="font-size: 1.5rem; color: #192a51; font-weight: 600;">Description</h4>
                                <p style="text-align: justify">I have chosen Database Technology as my streaming specialization for both Semester 4 and Semester 5...</p>
                            </div>
                            <hr>
                        @endfor
                        <div class="mb-3 d-flex justify-content-center">
                           <button class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#addEducationModal">Add Education</button>
                        </div>
                    </div>

                    <!-- Professional Experience Tab -->
                    <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                       
                        @for($i = 0; $i < 3; $i++)
                            <div class="d-md-flex align-items-center mb-4">
                                <div class="col-12 col-md-2 mb-2 d-flex justify-content-center">
                                    <img src="{{asset('assets/tokopedia.jpeg')}}" alt="Profile Image" class="profile-image">
                                </div>
                                <div class="col-12 col-md-7 ms-3">
                                    <h4 class="card-title mb-2">Back-end Developer</h4>
                                    <p class="section-description mb-0" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">
                                        Tokopedia • Full-time
                                    </p>
                                    <p class="section-description mb-0" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">
                                        Jan 2024 - Nov 2024
                                    </p>
                                    <p class="section-description mb-2" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">
                                        Jakarta, Indonesia
                                    </p>
                                    
                                    <a href="{{route('editExperience')}}"><button class="btn btn-warning btn-custom">Edit</button></a>
                                    <button class="btn btn-danger btn-custom">Delete</button>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex flex-column justify-content-center">
                                <h4 class="section-title mb-2" style="font-size: 1.5rem; color: #192a51; font-weight: 600;">Description</h4>
                                <p style="text-align: justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                            </div>
                            <hr>
                        @endfor
                        <div class="mb-3 d-flex justify-content-center">
                            <button class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#addExperienceModal">Add Experience</button>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
                        <strong>Name: </strong><span>Jane Doe</span><br>
                        <strong>Email: </strong><span>janedoe@example.com</span><br>
                        <strong>Phone: </strong><span>+123456789</span><br>
                        <strong>Description: </strong><span>Software Developer, passionate about coding and technology.</span><br>
                        <button class="btn btn-warning btn-custom mt-3" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
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
                <form action="test" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="school" class="form-label">School/University</label>
                        <input type="text" class="form-control" id="school" name="school" required>
                    </div>
                    <div class="mb-3">
                        <label for="degree" class="form-label">Degree</label>
                        <input type="text" class="form-control" id="degree" name="degree" required>
                    </div>
                    <div class="mb-3">
                        <label for="field" class="form-label">Field of Study</label>
                        <input type="text" class="form-control" id="field" name="field" required>
                    </div>
                    <div class="mb-3">
                        <label for="gpa" class="form-label">GPA</label>
                        <input type="number" class="form-control" id="gpa" name="gpa" min="0" max="4.0" step="0.01" required>
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
                <form action="ertest" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="company" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="company" name="company" required>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control" id="position" name="position" required>
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Job Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
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
                <form action="updateProfile" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="Jane Doe" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="janedoe@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="+123456789" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required>Software Developer, passionate about coding and technology.</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
