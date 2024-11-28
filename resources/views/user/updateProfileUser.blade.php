@extends('layout.master')

@section('content')

<style>
    .profile-image {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
    }
</style>

<div class="container py-5">
    <div class="row">
            <a href="{{route('user.home')}}" class="text-primary text-decoration-none mb-4 d-inline-block">
                <i class="bi bi-arrow-left-circle"></i> Back to Home
            </a>
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
                        @for($i = 0; $i < 2; $i++)
                            <div class="d-md-flex align-items-center mb-4">
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
                                    
                                    <button class="btn btn-warning btn-custom" data-bs-toggle="modal" data-bs-target="#editEducation">Edit</button>
                                    <button class="btn btn-danger btn-custom" id="del">Delete</button>
                                   
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
                                    
                                    <button class="btn btn-warning btn-custom" id="#editExperience" data-bs-toggle="modal" data-bs-target="#editExperience">Edit</button>
                                    <button class="btn btn-danger btn-custom" id="del">Delete</button>
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

                    <div class="tab-pane fade show active" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
                        <div class="card shadow-sm p-4" style="border-radius: 10px; background-color: #f8f9fa;">
                            <div class="d-flex justify-content-center mb-3">
                                <img src="{{asset('assets/sen.png')}}" alt="Profile Image" class="profile-image" 
                                    style="width: 170px; height: 170px; object-fit: cover; border-radius: 50%; border: 3px solid #ffc107;">
                            </div>
                            <div class="text-center">
                                <h4 class="fw-bold mb-2">Jane Doe</h4>
                                <p class="text-muted mb-4">Undergraduate Computer Science Student at BINUS University | Stock Market Enthusiast | @ShARE Do Well Do Good BINUS | Scholarship Mentor</p>
                            </div>
                            <strong class="fs-5">Description</strong>
                            <p style="text-align: justify;">Vincent (20) is a Computer Science student at Bina Nusantara University with a strong passion for programming and problem-solving. His educational journey has ignited a deep interest in the fast-paced world of technology, and he is committed to continuously refining his skills and staying up-to-date with the latest industry trends. With strengths in teamwork and effective communication, he is a reliable collaborator in diverse environments, bringing a solutions-oriented mindset to each project. He is driven to contribute innovative solutions to real-world challenges through his technical expertise and analytical thinking. Eager to pursue growth in both personal and professional capacities, he actively seeks opportunities to connect with like-minded individuals and embrace new challenges. He is enthusiastic about collaborating with professionals, mentors, and peers who share his dedication to advancing technology and making a meaningful impact.</p>
                            <strong class="fs-5">Email </strong><span class="mb-3">janedoe@example.com</span>
                            <strong class="fs-5">Phone </strong><span class="mb-3">+123456789</span>
                            <strong class="fs-5">Birth Date </strong><span class="mb-3">January 1, 2004</span>
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
                <form action="test" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="school" class="form-label">School/University</label>
                        <input type="text" class="form-control" id="school" name="school">
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
                        <label for="gpa" class="form-label">GPA</label>
                        <input type="number" class="form-control" id="gpa" name="gpa" min="0" max="4.0" step="1">
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="test" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="school" class="form-label">School/University</label>
                        <input type="text" class="form-control" id="school" name="school">
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
                        <label for="gpa" class="form-label">GPA</label>
                        <input type="number" class="form-control" id="gpa" name="gpa" min="0" max="4.0" step="0.01">
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
                        <input type="text" class="form-control" id="company" name="company">
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control" id="position" name="position">
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Job Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
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
                        <input type="text" class="form-control" id="name" name="name" value="Jane Doe">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="janedoe@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="+123456789">
                    </div>
                    <div class="mb-3">
                        <label for="birthDate" class="form-label">Birth Date</label>
                        <input type="date" textarea class="form-control" id="birthDate" name="birthDate">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4">Software Developer, passionate about coding and technology.</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Profile Picture</label>
                        <input type="file" textarea class="form-control" id="photo" name="photo">
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
                    <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Enter company name">
                </div>
                
                <div class="mb-3">
                    <label for="jobTitle" class="form-label">Job Title</label>
                    <input type="text" class="form-control" id="jobTitle" name="jobTitle" placeholder="Enter job title">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Describe your role and achievements" rows="4"></textarea>
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
                    <a href="{{route('updateUser')}}" class="btn btn-secondary">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


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
</script>


@endsection

