<!doctype html>
<html lang="en">
<head>
    <link href="{{ asset('css/homeCompany.css') }}" rel="stylesheet">

</head>
<body>
    @extends('layouts.app')

    @section('content')

        <section class="" style="background-color:#c0dcf7;">
            <div class="row px-4 py-3 mx-3">
                <div class="col-12 m-3">
                    <h2 class="fw-bold text-center text-md-start" style="color: #682b90">Welcome back, [Company Name]!</h2>
                    <h5 class="text-center text-md-start fw-bold">Here's your recruitment performance overview. Let's check out how your listings are doing.</h5>
                    <div class="row d-md-flex border border-3">
                        <div class="col-md-8 m-auto p-4 text-start mx-0">
                            <h4 class="fw-bold">Total Job Listings: <span style="color: #7869cd">20 Active Positions</span></h4>
                            <h4 class="fw-bold">Total Applicants: <span style="color: #7869cd">500,000</span></h4>
                            <h4 class="fw-bold">Applicants This Month: <span style="color: #7869cd">1,000</span></h4>
                            <h4 class="fw-bold">Top Job Posting: <span style="color: #7869cd">20,000 Applicants</span> (Software Engineer)</h4>
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
                    <h3 class="fw-bold">Manage Your Workflow</h3>
                </div>
                <div class="d-flex overflow-x-auto">

                    <div class="col-12 col-md-6 text-center d-flex flex-column">
                        <div class="card m-3 p-4 flex-fill">
                            <img class="card-img-top mx-auto mb-3" src="{{asset('assets/newJob.png')}}" style="max-width: 200px">
                            <h2 class="card-title fw-bold" style="color: #682b90">Job Listing</h5>
                            <p class="card-text text-muted">Ready to create a new job posting head over to new job application.</p>
                            <a href="{{route('company.listJob')}}" class="btn btn-outline-primary m-4 rounded-pill mt-auto">Create New Job</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 text-center d-flex flex-column">
                        <div class="card m-3 p-4 flex-fill">
                            <img class="card-img-top mx-auto mb-3" src="{{asset('assets/companyProfileJob.jpg')}}" style="max-width: 200px">
                            <h2 class="card-title fw-bold" style="color: #682b90">Company Profile</h5>
                            <p class="card-text text-muted">Update any company details such as address, description, and others.</p>
                            <a href="{{route('company.profile')}}" class="btn btn-outline-primary m-4 rounded-pill mt-auto">Edit Company Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="hidden">
            <div class="row px-4 py-3 m-3 hidden">
                <div class="col-12">
                    <h3 class="fw-bold">Recent Job Listing</h3>
                    <div class="row">

                        @for ($i=0;$i<3;$i++)
                            <div class="col-12">
                                <div class="card m-3 p-4 d-flex flex-column flex-md-row align-items-center">
                                    <img class="card-img-top mx-auto p-3 mb-3" alt="image" src="{{asset('assets/joblistImagePlaceHolder.jpeg')}}" style="width:300px;">
                                    
                                    <div class="card-body text-start">
                                        <button class="btn btn-sm btn-outline-danger rounded-pill mb-2" style="width: 80px; pointer-events:none" alt="status job">Closed</button>
                                        <h3 class="card-title fw-bold text-start" style="color: #682b90">Job Type</h3>
                                        <p class="card-text text-muted text-start" alt="job description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio praesentium, qui atque delectus animi accusantium odio culpa eveniet porro laudantium.</p>
                                        <h5 class="fw-bold text-center text-md-end">Total Applicant</h5>
                                        <h5 class="fw-bold text-center text-md-end">5000</h5>
                                    </div>

                                </div>
                            </div>
                        @endfor
                    
                    </div>
                </div>
            </div>
        </section>

            <a></a>
    </main>


    

    {{-- Start of Footer --}}
    @include('components.footer')
    {{-- End of Footer --}}




<!-- FontAwesome Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
{{-- Start of Bootstrap 5 --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
{{-- End of Bootstrap 5 --}}
<script src="{{ asset('js/script.js') }}"></script>

@endsection
</body>                 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
    @include('components.navbar')
    Testing {{session('company_id')}}
    Testing {{Auth::user()->name}}

    <a href="/testing_export/8" class="btn btn-success rounded-pill"> Download CSV</a>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>
