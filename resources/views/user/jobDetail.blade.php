@extends('layout.master')

@section('content')
<style>
    body {
        background-color: #f8f9fa;
    }

    .job-card {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
    }

    .job-header {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .company-logo {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
    }

    .job-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #212529;
    }

    .btn-primary {
        padding: 0.5rem 1.5rem;
        font-size: 1rem;
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 0.75rem;
    }

    @media (max-width: 576px) {
        .jobsTitle h1{
            font-size: 1.4rem;
        }
        .jobsTitle h5{
            font-size: 1.2rem;
        }
    }
    @media (max-width: 320px) {
        .jobsTitle h1{
            font-size: 1.1rem;
        }
        .jobsTitle h5{
            font-size: 1rem;
        }
    }
</style>

@include('components.navbar')

{{-- <div class="container mt-5">
    <a href="{{route('jobs')}}" class="text-primary text-decoration-none mb-4 d-inline-block">
        <i class="bi bi-arrow-left-circle"></i> Back to Jobs
    </a>

    <div class="job-card">
        <div class="job-header">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-2 d-flex justify-content-center mb-2">
                    <img src="{{asset('assets/bbca.jpeg')}}" alt="Company Logo" class="company-logo">
                </div>

                <div class="jobsTitle col-12 col-sm-12 col-md-10">
                    <h1 class="job-title">Senior Back-end Developer - PT Bank Central Asia Tbk</h1>
                    <h5 class="text-muted">Jakarta, Indonesia · Last Update: 20 November 2024</h5>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <div class="job-details">
            <h2 class="section-title">Job Description</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore odio cupiditate, consectetur sit officiis eligendi autem doloribus recusandae mollitia nobis voluptates nemo similique animi quaerat ad. Sit autem dolore voluptatum impedit nostrum, natus tempore asperiores unde vitae amet, exercitationem neque, necessitatibus blanditiis doloribus repellat hic officiis. Labore hic quidem reprehenderit voluptates sit? Similique quo, magnam error et, recusandae voluptate excepturi explicabo quisquam molestias non quasi inventore veritatis amet praesentium, neque dolor. Mollitia velit qui ab quos illo veniam esse. Inventore asperiores odit deserunt eaque qui tempore error nemo hic ut doloribus consectetur, blanditiis culpa aliquid ex recusandae, esse, veniam iusto.</p>
            <h2 class="section-title">Requirements</h2>
            <ul>
                <li>Proven experience as a Back-end Developer.</li>
                <li>Strong knowledge of PHP, Golang, or Node.js.</li>
                <li>Experience with database management (MySQL, PostgreSQL).</li>
                <li>Familiarity with cloud services like AWS or GCP.</li>
            </ul>

            <h2 class="section-title">Benefits</h2>
            <ul>
                <li>Competitive salary package.</li>
                <li>Health insurance.</li>
                <li>Flexible working hours.</li>
                <li>Professional development opportunities.</li>
            </ul>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam esse ipsa tempora! Obcaecati animi laudantium nobis quas harum aspernatur delectus. Facere quas at praesentium. Eius, cupiditate harum nisi alias facere libero architecto dolor sunt accusamus recusandae amet nihil unde enim incidunt repellat modi qui reprehenderit expedita repudiandae at ducimus? Temporibus?</p>

            <div class="text-center mt-4">
                <button class="btn btn-primary">Apply Now</button>
            </div>
        </div>
    </div>
</div>

<hr class="mt-5"> --}}
<div class="container mt-5">
    <a href="{{route('jobs')}}" class="text-primary text-decoration-none mb-4 d-inline-block">
        <i class="bi bi-arrow-left-circle"></i> Back to Jobs
    </a>

    <div class="job-card">
        <div class="job-header">
            <div class="row w-100">
                <div class="col-12 col-md-2 d-flex justify-content-center mb-2">
                    <img src="{{asset('assets/bbca.jpeg')}}" alt="Company Logo" class="company-logo">
                </div>

                <div class="jobsTitle col-12 col-md-10">
                    <h1 class="job-title">{{$job->title}} - {{$job->company->user->name}}</h1>
                    <h5 class="text-muted">{{$job->address}} · Last Update: {{$job->updated_at->format('d F Y')}}</h5>
                    <p class="{{ $job->job_type == 'Full Time' ? 'bg-success' : ($job->job_type == 'Part Time' ? 'bg-warning' : 'bg-danger') }} rounded-pill">
                        {{ $job->job_type }}
                    </p>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <div class="job-details">
            <h2 class="section-title">Job Description</h2>
            <p> {{$job->description}} </p>
            <h2 class="section-title">Requirements</h2>
            <ul>
                @forelse ($requirement as $line)
                    <li>{{ e(trim($line, '- ')) }}</li>
                    @empty
                    <div class="alert alert-danger">
                        No requirement available yet
                    </div>
                @endforelse
            </ul>

            <h2 class="section-title">Benefits</h2>
            <div class="d-flex flex-column">
                @forelse ($benefit as $line)
                    <div class="m-0">{{$line}}</div>
                @empty
                    <div class="alert alert-danger">
                        No benefit available yet
                    </div>
                @endforelse
            </div>

            <h2 class="section-title">Skill Requirement</h2>
            <ul>
                @forelse ($result as $item)
                    <li>{{$item->skill_name}}</li>
                @empty
                    <div class="alert alert-danger">
                        No skill required yet
                    </div>
                @endforelse
            </ul>

            <div class="text-center mt-4">
                <button class="btn btn-primary">Apply Now</button>
            </div>
        </div>
    </div>
</div>

<hr class="mt-5">

@include('components.footer')

@endsection()
