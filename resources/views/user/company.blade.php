@extends('layout.master')

@section('content')
<style>
    .nav-link{
        font-size: 1.2rem;
    }
    .section-title {
        font-size: 1.4rem;
        font-weight: bold;
        margin-bottom: 1rem;
        color: #0056b3;
    }
    .card-title {
        font-weight: 500;
    }

    .card-text {
        color: #555;
        margin-bottom: 1rem;
    }
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-primary {
        background-color: #0056b3;
        border-color: #0056b3;
        font-size: 0.9rem;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #004095;
        border-color: #004095;
    }
    .btn-dark {
        font-size: 0.9rem;
        font-weight: 500;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-dark:hover {
        background-color: #333;
        color: #fff;
    }

</style>

@include('components.navbar')

    <div class="position-relative">
        <img src="{{asset('assets/bannerCompany.jpg')}}"
             alt="Company Cover"
             class="img-fluid w-100"
             style="object-fit: cover; height: 50vh; max-height: 500px;">

        <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
            <h1 class="display-4 fw-bold text-wrap">Welcome to PT Bank Central Asia TBK</h1>
            <p class="lead text-wrap fw-bold" style="color: gold; font-size: 1.8rem">Your trusted financial partner.</p>
        </div>
    </div>

    <div class="container mt-4">
        <a href="{{route('jobs')}}" class="text-primary text-decoration-none mb-4 d-inline-block">
            <i class="bi bi-arrow-left-circle"></i> Back to Jobs
        </a>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-4">
                    <div class="row">
                        <div class="col-12 col-md-3 ms-3 mb-2 d-flex justify-content-center">
                            <img src="{{asset('assets/bbca.jpeg')}}" alt="Company Logo" class="rounded-circle" width="150" height="150">
                        </div>

                        <div class="col-12 col-md-8">
                            <div>
                                <h3 class="card-title mb-0 mt-2">PT Bank Central Asia TBK</h3>
                                <p class="text-muted mt-2">Menara BCA Grand Indonesia, Jl. M.H. Thamrin No.1, Menteng, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10310</p>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="nav nav-tabs mb-4" id="companyTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active fw-bold" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab">Company Information</button>
                    </li>
                </ul>

                <div class="tab-content" id="companyTabContent">
                    <h4 class="section-title" style="text-align:justify">Description</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore odio cupiditate, consectetur sit officiis eligendi autem doloribus recusandae mollitia nobis voluptates nemo similique animi quaerat ad. Sit autem dolore voluptatum impedit nostrum, natus tempore asperiores unde vitae amet, exercitationem neque, necessitatibus blanditiis doloribus repellat hic officiis. Labore hic quidem reprehenderit voluptates sit? Similique quo, magnam error et, recusandae voluptate excepturi explicabo quisquam molestias non quasi inventore veritatis amet praesentium, neque dolor. Mollitia velit qui ab quos illo veniam esse. Inventore asperiores odit deserunt eaque qui tempore error nemo hic ut doloribus consectetur, blanditiis culpa aliquid ex recusandae, esse, veniam iusto.</p>

                    <h4 class="section-title">Field</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, excepturi!</p>
                </div>

            </div>
        </div>


        <div class="card mt-3">
            <div class="card-body">
                <ul class="nav nav-tabs mb-4" id="companyTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active fw-bold" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab">Job Vacanies</button>
                    </li>
                </ul>

                <div class="tab-content" id="companyTabContent">
                    <h4 class="section-title">Discover Exciting Job Vacancies</h4>
                    <p class="mb-4">Join us and be part of a dynamic team where your ideas and skills will make a significant impact.
                        We are dedicated to fostering a collaborative and innovative environment that drives personal growth
                        and professional success.</p>
                        <div class="row">
                            @for($i = 0; $i < 3; $i++)
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Senior Back-end Developer</h5>
                                            <p class="card-text text-truncate" style="max-height: 48px; overflow: hidden;">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Suspendisse ultricies, arcu at laoreet consectetur, tortor est volutpat turpis,
                                                ac lacinia ex risus ac risus. Integer nec felis risus. Morbi eu justo at erat tincidunt vehicula.
                                            </p>
                                            <a href="" class="btn btn-primary">Apply Now</a>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            <div class="d-flex flex-md-row justify-content-center gap-2 mt-4 mb-3" style="width: 100%;">
                                <a href="{{route('companyJobVacancies')}}" class="btn btn-dark" style="font-size: 1.2rem; padding: 8px 18px;">
                                    View all Job Vacancies
                                </a>
                            </div>
                        </div>
                    </div>

                <hr class="my-4">
            </div>
        </div>



        <div class="card mt-3 shadow">
            <div class="card-body">
                <ul class="nav nav-tabs mb-4" id="companyTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active fw-bold" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab">Contact Us</button>
                    </li>
                </ul>

                <div class="tab-content" id="companyTabContent">
                    <h5 class="section-title">Get Closer to PT Bank Central Asia TBK</h5>
                    <p class="mb-4">
                        We’d love to hear from you! Reach out to us through any of the following channels, and let’s build a stronger connection.
                    </p>

                    <div class="row mb-4">
                        <div class="col-md-4 d-flex align-items-start">
                            <i class="bi bi-envelope-fill text-primary me-3" style="font-size: 2rem;"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Email</h6>
                                <a href="mailto:bbca-career@bca.co.id" class="text-decoration-none text-dark">bbca-career@bca.co.id</a>
                            </div>
                        </div>

                        <div class="col-md-4 d-flex align-items-start">
                            <i class="bi bi-telephone-fill text-success me-3" style="font-size: 2rem;"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Phone Number</h6>
                                <p class="mb-0">+62 8952421412</p>
                            </div>
                        </div>

                        <div class="col-md-4 d-flex align-items-start">
                            <i class="bi bi-geo-alt-fill text-danger me-3" style="font-size: 2rem;"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Address</h6>
                                <p class="mb-0">Menara BCA Grand Indonesia, Jl. M.H. Thamrin No.1, Menteng, Jakarta 10310</p>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">
                    <h5 class="fw-bold text-center">Follow <span style="color: #0056b3">PT Bank Central Asia Tbk</span> on Social Media</h5>

                    <div class="d-flex justify-content-center" style="gap: 20px">
                        <a href="https://www.facebook.com/" class="text-dark">
                            <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                        </a>
                        <a href="https://x.com/" class="text-dark">
                            <i class="bi bi-twitter" style="font-size: 1.5rem;"></i>
                        </a>
                        <a href="https://id.linkedin.com/" class="text-dark">
                            <i class="bi bi-linkedin" style="font-size: 1.5rem;"></i>
                        </a>
                        <a href="https://www.instagram.com/" class="text-dark">
                            <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>


    </div>

    <hr class="mt-5">

@include('components.footer')
@endsection()
