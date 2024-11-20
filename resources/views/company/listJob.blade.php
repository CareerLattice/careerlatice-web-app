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
            <a href="{{route('company.createJob')}}" class="btn btn-success mb-3">Add New Job Listing</a>
        </div>
        <div class="row">
            {{-- {{dd($jobs)}} --}}
            @forelse ($jobs as $job)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow h-100">
                        <img src="{{asset('assets/bbca.jpeg')}}" alt="Job Image" class="card-img-top">
                        <div class="card-body d-flex flex-column align-items">
                            <h5 class="card-title">Frontend Developer</h5>
                            <p class="card-subtitle text-muted mb-3">{{$job->job_type}} /
                                <span class="border bg-success text-light rounded px-1 d-inline-block shadow-sm">
                                    @if ($job->is_active == true)
                                        Open
                                    @else
                                        Closed
                                    @endif
                                </span>
                            </p>
                            <p><strong>Company:</strong> {{Auth::user()->name}}</p>

                            <p><strong>Location:</strong>{{$job->address}}</p>
                            <p class="text-truncate"><strong>Description:</strong> {{$job->description}}</p>
                            <p><strong>Person in Charge:</strong>{{$job->person_in_charge}}</p>
                            <p><strong>Last Updated:</strong>{{$job->updated_at->format('d F Y')}}</p>

                            <a href="{{route('company.job', ['job' => $job])}}" class="btn btn-primary mt-auto">Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">
                    No job listings found.
                </div>
            @endforelse
        </div>
    </div>

    <!-- Link ke Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
