<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings - Company View</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <a href="{{route('company.home')}}" class="text-primary text-decoration-none mb-4 d-inline-block">
            <i class="bi bi-arrow-left-circle"></i> Back
        </a>
        <h2 class="mb-4">Job Listings</h2>
        <div class="mt-4 mb-3">
            <a href="{{route('createJob')}}" class="btn btn-success mb-3">Add New Job Listing</a>
        </div>
        <div class="row">
            <!-- Kartu Pekerjaan 1 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100">
                    <img src="{{asset('assets/BCA.jpg')}}" alt="Job Image" class="card-img-top">
                    <div class="card-body d-flex flex-column align-items">
                        <h5 class="card-title">Frontend Developer</h5>
                        <p class="card-subtitle text-muted mb-3">Internship / <span class="border bg-success text-light rounded px-1 d-inline-block shadow-sm">Active</span></p>
                        <p><strong>Company:</strong> BCA</p>
                       
                        <p><strong>Location:</strong> Jakarta, Indonesia</p>
                        <p><strong>Opening Date:</strong> January 15, 2024</p>
                        <p><strong>Description:</strong>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio, enim!</p>
                        <p><strong>Person in Charge:</strong> Michelle Joanne</p>
                        <!-- Tombol Details di bagian bawah -->
                        <a href="#" class="btn btn-primary mt-auto">Details</a>
                    </div>
                </div>
            </div>

            <!-- Kartu Pekerjaan 2 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100">
                    <img src="{{asset('assets/BCA.jpg')}}" alt="Job Image" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Backend Developer</h5>
                        <p class="card-subtitle text-muted mb-3">On-site / <span class="border bg-danger text-light rounded px-1 d-inline-block shadow-sm">Closed</span></p>
                        <p><strong>Company:</strong> BCA</p>
                      
                        <p><strong>Location:</strong> Surabaya, Indonesia</p>
                        <p><strong>Opening Date:</strong> February 1, 2024</p>
                        <p><strong>Description:</strong> Develop and maintain the backend infrastructure for web applications.</p>
                        <p><strong>Person in Charge:</strong> Michelle Joanne</p>
                        <!-- Tombol Details di bagian bawah -->
                        <a href="#" class="btn btn-primary mt-auto">Details</a>
                    </div>
                </div>
            </div>

            <!-- Kartu Pekerjaan 3 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100">
                    <img src="{{asset('assets/BCA.jpg')}}" alt="Job Image" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Fullstack Developer</h5>
                        <p class="card-subtitle text-muted mb-3">Part-time /  <span class="border bg-success text-light rounded px-1 d-inline-block shadow-sm">Active</span></p>
                        <p><strong>Company:</strong> BCA</p>
                      
                        <p><strong>Location:</strong> Bali, Indonesia</p>
                        <p><strong>Opening Date:</strong> March 10, 2024</p>
                        <p><strong>Description:</strong> Work on both frontend and backend development of web applications.</p>
                        <p><strong>Person in Charge:</strong> Michelle Joanne</p>
                        <a href="details.html" class="btn btn-primary mt-auto">Details</a>
                    </div>
                </div>
            </div>

            <!-- Kartu Pekerjaan 4 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100">
                    <img src="{{asset('assets/bbca.jpeg')}}" alt="Job Image" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">UX/UI Designer</h5>
                        <p class="card-subtitle text-muted mb-3">Internship /  <span class="border bg-success text-light rounded px-1 d-inline-block shadow-sm">Active</span></p>
                        <p><strong>Company:</strong> BCA</p>
                        
                        <p><strong>Location:</strong> Yogyakarta, Indonesia</p>
                        <p><strong>Opening Date:</strong> January 30, 2024</p>
                        <p><strong>Description:</strong> Design user-friendly interfaces and improve user experience.</p>
                        <p><strong>Person in Charge:</strong> Michelle Joanne</p>
                        <a href="#" class="btn btn-primary mt-auto">Details</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100">
                    <img src="{{asset('assets/BCA.jpg')}}" alt="Job Image" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">UX/UI Designer</h5>
                        <p class="card-subtitle text-muted mb-3">Internship /  <span class="border bg-success text-light rounded px-1 d-inline-block shadow-sm">Active</span></p>
                        <p><strong>Company:</strong> BCA</p>
                        
                        <p><strong>Location:</strong> Yogyakarta, Indonesia</p>
                        <p><strong>Opening Date:</strong> January 30, 2024</p>
                        <p><strong>Description:</strong> Design user-friendly interfaces and improve user experience.</p>
                        <p><strong>Person in Charge:</strong> Michelle Joanne</p>
                        <a href="#" class="btn btn-primary mt-auto">Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100">
                    <img src="{{asset('assets/BCA.jpg')}}" alt="Job Image" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">UX/UI Designer</h5>
                        <p class="card-subtitle text-muted mb-3">Internship /  <span class="border bg-success text-light rounded px-1 d-inline-block shadow-sm">Active</span></p>
                        <p><strong>Company:</strong> BCA</p>
                        
                        <p><strong>Location:</strong> Yogyakarta, Indonesia</p>
                        <p><strong>Opening Date:</strong> January 30, 2024</p>
                        <p><strong>Description:</strong> Design user-friendly interfaces and improve user experience.</p>
                        <p><strong>Person in Charge:</strong> Michelle Joanne</p>
                        <a href="#" class="btn btn-primary mt-auto">Details</a>
                    </div>
                </div>
            </div>  
        </div>
    </div>

    <!-- Link ke Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>