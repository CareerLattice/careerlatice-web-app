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

    <div class="position-relative">
        <img src="{{asset('assets/tesBannerUser.jpeg')}}" alt="Company Cover" class="img-fluid w-100" style="object-fit: cover; height: 35vh;">
        <div class="bannerText position-absolute top-50 start-50 translate-middle text-center text-white px-4">
            <p class="lead text-wrap fw-bold" style="font-weight: 600;">Unleash your potential with <span style="color: #682b90;">CareerLattice—connect, explore, and land</span> your dream job.</p>
        </div>
    </div>

    <div class="container mt-5">
        <h3 class="container-title mb-4" style="font-size: 1.8rem; color: #192A51; font-weight: 700;">
            Current Active <span style="color: #682b90">Job Applications</span>
        </h3>
        <div class="row">
                @forelse ($jobApplications as $jobVacancy)
                    <div class="col-sm-6 col-md-4 mb-4">
                        <div class="card job-card shadow-sm rounded-3">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title fw-bold mb-2 text-primary">{{ $jobVacancy->name }}</h5>
                                    <span class="badge bg-secondary text-light">{{ $jobVacancy->status }}</span>
                                </div>
                                <p class="card-text text-muted mb-2 fw-bold">{{ $jobVacancy->title }}</p>
                                <p class="card-text text-muted">
                                    <small>Applied on {{ $jobVacancy->created_at }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="col-12">
                    <p class="text-muted text-center">You have no active job applications.</p>
                </div>
            @endforelse
        </div>
        
        <div class="text-center mb-4">
            <a href="{{route('user.jobVacancies')}}" class="btn btn-primary" style="background-color: #682b90; border-color: #682b90;">
                Show All Job Applications
            </a>
        </div>

        <hr>
    </div>

    <div class="container mt-4">
        <h3 class="container-title mb-4" style="font-size: 1.8rem; color: #192A51; font-weight: 700;">Your <span style="color: #682b90">Profile</span></h3>
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center mb-4">
                    <div class="col-12 col-md-3 mb-2 d-flex justify-content-center">
                        <img src="{{asset('assets/sen.png')}}" alt="Profile Image" class="profile-image" style="width: 170px; height: 170px; object-fit: cover; border-radius: 50%;">
                    </div>
                    <div class="col-12 col-md-7 ms-3">
                        <h3 class="card-title mb-2">Vincent Oliver Limarus</h3>
                        <p class="section-description" style="font-size: 1rem; color: #6c757d; line-height: 1.6;">
                            Undergraduate Computer Science Student at BINUS University | Stock Market Enthusiast | @ShARE Do Well Do Good BINUS | Scholarship Mentor
                        </p>
                        <a href="{{route ('updateUser')}}" class="btn btn-outline-success">Edit Profile</a>
                    </div>
                </div>
                <ul class="nav nav-tabs mb-4" id="companyTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="fs-5 nav-link active fw-bold" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab">About Me</button>
                    </li>
                </ul>
                <div class="tab-content" id="companyTabContent">
                    <h4 class="section-title mb-3" style="font-size: 1.5rem; color: #192a51; font-weight: 600;">Description</h4>
                    <p style="text-align: justify">Vincent (20) is a Computer Science student at Bina Nusantara University with a strong passion for programming and problem-solving. His educational journey has ignited a deep interest in the fast-paced world of technology, and he is committed to continuously refining his skills and staying up-to-date with the latest industry trends.
                        With strengths in teamwork and effective communication, he is a reliable collaborator in diverse environments, bringing a solutions-oriented mindset to each project. He is driven to contribute innovative solutions to real-world challenges through his technical expertise and analytical thinking.
                        Eager to pursue growth in both personal and professional capacities, he actively seeks opportunities to connect with like-minded individuals and embrace new challenges. He is enthusiastic about collaborating with professionals, mentors, and peers who share his dedication to advancing technology and making a meaningful impact.
                    </p>
                    <hr>
                    <h4 class="section-title mb-3" style="font-size: 1.5rem; color: #192a51; font-weight: 600;">Personal Information</h4>
                    <p><strong>Email:</strong> vincentlimarus27@gmail.com</p>
                    <p><strong>Phone Number:</strong> +62 895 4013 60072</p>
                    <p><strong>Address:</strong> Jalan Raya No. 123, Jakarta, Indonesia</p>
                    <p><strong>Birth Date:</strong> January 1, 2004</p>

                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <ul class="nav nav-tabs mb-4" id="companyTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="fs-5 title nav-link active fw-bold" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab">Education</button>
                    </li>
                </ul>
                @for($i = 0; $i < 2; $i++)
                    <div class="d-md-flex align-items-center mb-4">
                        <div class="col-12 col-md-2 mb-2 d-flex justify-content-center">
                            <img src="{{asset('assets/companiesLogo.jpg')}}" alt="Profile Image" class="profile-image" style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;">
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
                        </div>
                    </div>
                    <div class="col-md-12 d-flex flex-column justify-content-center">
                        <h4 class="section-title mb-2 " style="font-size: 1.5rem; color: #192a51; font-weight: 600;">Description</h4>
                        <p style="text-align: justify" class="">I have chosen Database Technology as my streaming specialization for both Semester 4 and Semester 5, reflecting my strong interest in data management, optimization, and storage solutions. This field has equipped me with a deeper understanding of database systems, query optimization, and modern database technologies, which are essential in building scalable and efficient applications. Additionally, in Semester 5, I am expanding my knowledge in full-stack development by taking Web Programming as a free elective course. This subject allows me to integrate my backend expertise with frontend development skills, enabling me to create dynamic and user-friendly web applications. Throughout my academic journey, I have actively worked on various projects and participated in activities that have honed my technical and problem-solving abilities. These experiences, coupled with the certifications I have earned, reflect my commitment to continuous learning and excellence in the field of Computer Science.
                        </p>
                    </div>
                    <hr>
                @endfor
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <ul class="nav nav-tabs mb-4" id="companyTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="fs-5 title nav-link active fw-bold" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab">Professional Experience</button>
                    </li>
                </ul>
                @for($i = 0; $i < 3; $i++)
                    <div class="d-md-flex align-items-center mb-4">
                        <div class="col-12 col-md-2 mb-2 d-flex justify-content-center">
                            <img src="{{asset('assets/tokopedia.jpeg')}}" alt="Profile Image" class="profile-image" style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;">
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
                        </div>
                    </div>
                    <div class="col-md-12 d-flex flex-column justify-content-center">
                        <h4 class="section-title mb-2 " style="font-size: 1.5rem; color: #192a51; font-weight: 600;">Description</h4>
                        <p style="text-align: justify" class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem commodi mollitia magnam, eveniet non sapiente? Excepturi, quae! Inventore, ipsum aut eligendi qui placeat dolores aliquid saepe perspiciatis, earum officiis sint! Repellendus, numquam rem atque voluptas itaque molestiae doloremque eos eius sed! Molestiae sed eius ab odio. Quis optio repellat molestiae.
                        </p>
                    </div>
                    <hr>
                @endfor
            </div>
        </div>
    </div>

    <hr class="mt-5">
    @include('components.footer')
@endsection
