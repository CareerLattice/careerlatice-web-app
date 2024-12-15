@extends('layouts.app')

@section('title', 'Job Vacancies')

<style>
    @media (max-width: 612px) {
        .bannerText {
            font-size: 1.8rem;
        }
        .bannerText h1 {
            font-size: 1.5rem;
        }
        .bannerText p {
            font-size: 1rem;
        }
    }

    @media (min-width: 613px) and (max-width: 992px) {
        .bannerText {
            font-size: 2.2rem;
        }
        .bannerText h1 {
            font-size: 2rem;
        }
        .bannerText p {
            font-size: 1.2rem;
        }
    }

    @media (min-width: 993px) {
        .bannerText {
            font-size: 3rem;
        }
        .bannerText h1 {
            font-size: 2.5rem;
        }
        .bannerText p {
            font-size: 1.5rem;
        }
    }
</style>

@section('content')
    @include('components.navbar')

    <div class="position-relative" style="position: relative;">
        <img src="{{ asset('assets/bannerUserJobVacan.jpg') }}" alt="Job Opportunities Banner" class="img-fluid"
            style="object-fit: cover; width: 100%; height: 35vh; max-height: 450px;">

        <div class="container position-absolute top-50 start-50 translate-middle text-center"
            style="transform: translate(-50%, -50%); color: black;">
            <h1 class="fw-bold" style="font-size: 2rem;">
                {{__('lang.hello')}} <span style="color: #0d6efd;">{{ Auth::user()->name }}</span>! {{__('lang.journeyAwait')}}
            </h1>
            <p style="font-size: 1.2rem; color: black;">
                {{__('lang.endlessPossibilities')}}
        </div>
    </div>

    <div class="container mt-5">
        <h3 class="container-title mb-4" style="font-size: 1.8rem; color: #192A51; font-weight: 700;">
            {{__('lang.currentActive')}} <span style="color: #682b90">{{__('lang.jobApp')}}</span>
        </h3>
        <div class="row">
            @forelse ($userJobApplications as $jobVacancy)
                <div class="col-sm-12 col-md-6 mb-4">
                    <div class="card job-card shadow-sm" style="border-radius: 8px;">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title fw-bold mb-2" style="color: #192a51;">{{ $jobVacancy->name }}</h5>
                                <span class="badge bg-secondary">{{ $jobVacancy->status }}</span>
                            </div>
                            <p class="card-text text-muted mb-2 fw-bold">{{ $jobVacancy->title }}</p>
                            <p class="card-text text-muted">
                                <small>{{__('lang.appliedOn')}} {{ $jobVacancy->created_at ?? 'Unknown Date' }}</small>
                            </p>
                            <div class="d-flex gap-2">
                                <div>
                                    <button 
                                        onclick="window.location.href='{{ route('user.jobDetail', ['job' => $jobVacancy->id]) }}'" 
                                        id="view-job-btn" 
                                        class="btn btn-primary" 
                                        style="background-color: #682b90; border-color: #682b90;">
                                        {{__('lang.viewJobVac')}}
                                    </button>


                                </div>
                                @if ($jobVacancy->status != 'rejected' && $jobVacancy->status != 'accepted')
                                    <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to unapply from this job?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{__('lang.unapply')}}</button>
                                    </form>
                                @endif

                            </div>
                            
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted text-center">{{__('lang.noActiveJob')}}</p>
                </div>
            @endforelse

        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $userJobApplications->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <hr class="mt-5">

    @include('components.footer')
@endsection

@section('custom_script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll(".btn-danger").forEach((button) => {
            button.addEventListener("click", (event) => {
                event.preventDefault(); 
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Unapply it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Job Applicant has been deleted.",
                            icon: "success"
                        }).then(() => {
                            button.closest("form").submit();
                        });
                    }
                });
            });
        });
    });

    </script>
@endsection