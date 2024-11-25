@extends('layouts.app')

@section('title', 'Job Listings - Company View')

@section('content')
    @include('components.navbar')
    <div class="container my-5">
        <h2 class="mb-4">Job Listings</h2>
        <div class="mt-4 mb-3">
            <a href="{{route('company.createJobPage')}}" class="btn btn-success mb-3">Add New Job Listing</a>
        </div>
        <div class="row">
            @forelse ($jobs as $job)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow h-100">
                        <img src="{{asset('assets/bbca.jpeg')}}" alt="Job Image" class="card-img-top">
                        <div class="card-body d-flex flex-column align-items">
                            <h5 class="card-title">{{$job->title}}</h5>
                            <p class="card-subtitle text-muted mb-3">{{$job->job_type}} /
                                @if ($job->is_active == true)
                                    <span class="border bg-success text-light rounded px-1 d-inline-block shadow-sm">
                                        Open
                                    </span>
                                @else
                                    <span class="border bg-danger text-light rounded px-1 d-inline-block shadow-sm">
                                        Closed
                                    </span>
                                @endif
                            </p>

                            <p class="mb-1"><strong>Company:</strong> {{Auth::user()->name}}</p>
                            <p class="mb-1"><strong>Location: </strong>{{$job->address}}</p>
                            <p class="text-truncate mb-1"><strong>Description: </strong>{{$job->description}}</p>
                            <p class="mb-1"><strong>Person in Charge: </strong>{{$job->person_in_charge}}</p>
                            <p class="mb-1"><strong>Last Updated: </strong>{{$job->updated_at->format('d F Y')}}</p>

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

    @include('components.footer')
@endsection
