<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
    @include('components.navbar')

    <!-- Back button -->
    <div class="position-relative">
        <!-- Gambar Hero -->
        <img src="{{asset('assets/bannerCompany.jpg')}}" 
             alt="Company Cover" 
             class="img-fluid w-100" 
             style="object-fit: cover; height: 50vh; max-height: 500px;">
    
        <!-- Teks Hero -->
        <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
            <h1 class="display-4 fw-bold text-wrap">Welcome to PT Bank Central Asia TBK</h1>
            <p class="lead text-wrap">Your trusted financial partner.</p>
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
                                <h4 class="card-title mb-0 mt-2">PT Bank Central Asia TBK</h4>
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
                    <h3 class="section-title fw-bold" style="text-align:justify">Description</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore odio cupiditate, consectetur sit officiis eligendi autem doloribus recusandae mollitia nobis voluptates nemo similique animi quaerat ad. Sit autem dolore voluptatum impedit nostrum, natus tempore asperiores unde vitae amet, exercitationem neque, necessitatibus blanditiis doloribus repellat hic officiis. Labore hic quidem reprehenderit voluptates sit? Similique quo, magnam error et, recusandae voluptate excepturi explicabo quisquam molestias non quasi inventore veritatis amet praesentium, neque dolor. Mollitia velit qui ab quos illo veniam esse. Inventore asperiores odit deserunt eaque qui tempore error nemo hic ut doloribus consectetur, blanditiis culpa aliquid ex recusandae, esse, veniam iusto.</p>
                    
                    <h3 class="section-title fw-bold">Field</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, excepturi!</p>                    
                </div>

            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <ul class="nav nav-tabs mb-4" id="companyTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active fw-bold" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab">Contact Us</button>
                    </li>
                </ul>
        
                <div class="tab-content" id="companyTabContent">
                    <h3 class="section-title fw-bold">Get Closer to PT Bank Central Asia TBK</h3>
                    <p class="mb-4">We’d love to hear from you! Reach out to us through any of the following channels:</p>
                    
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-envelope-fill text-primary me-3" style="font-size: 1.5rem;"></i>
                        <div>
                            <h6 class="fw-bold mb-0">Email</h6>
                            <a href="mailto:bbca-career@bca.co.id" class="text-decoration-none text-dark">bbca-career@bca.co.id</a>
                        </div>
                    </div>
        
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-telephone-fill text-success me-3" style="font-size: 1.5rem;"></i>
                        <div>
                            <h6 class="fw-bold mb-0">Phone Number</h6>
                            <p class="mb-0">+62 8952421412</p>
                        </div>
                    </div>
        
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt-fill text-danger me-3" style="font-size: 1.5rem;"></i>
                        <div>
                            <h6 class="fw-bold mb-0">Address</h6>
                            <p class="mb-0">Menara BCA Grand Indonesia, Jl. M.H. Thamrin No.1, Menteng, Jakarta 10310</p>
                        </div>
                    </div>
                </div>
        
                <hr class="my-4">
                
                <h5 class="fw-bold text-center">Follow Us on Social Media</h5>
                <div class="d-flex justify-content-center">
                    <a href="#" class="text-primary mx-2" style="font-size: 1.5rem;">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="text-info mx-2" style="font-size: 1.5rem;">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="#" class="text-danger mx-2" style="font-size: 1.5rem;">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="text-primary mx-2" style="font-size: 1.5rem;">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>
        
    </div>

    <hr class="mt-5">
    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB30NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
