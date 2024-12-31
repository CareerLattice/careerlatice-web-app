@extends('layouts.app')

@section('title', 'Job Detail')

@section('custom_css')
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
            font-size: 1.35rem;
            font-weight: bold;
            margin-bottom: 0.55rem;
        }

        .user-profile{
            min-width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 80px;
        }
        .applicant-details .btn{
            padding: 1.2rem;
        }
        @media (max-width: 354px) {
        .table-responsive {
            overflow-x: auto;
        }

        table {
            min-width: 600px; /* Tambahkan lebar minimum agar tabel memiliki scroll horizontal */
        }
        .export{
            padding: 5px 10px;
            font-size: 10px;
            /* text-align: center; */
        }
}


    </style>
@endsection

@section('content')
    @include('components.navbar')
    <div class="container mt-5">
        <a href="{{route('company.listJob')}}" class="text-primary text-decoration-none mb-4 d-inline-block">
            <i class="bi bi-arrow-left-circle"></i> {{__('lang.backCompanyJob')}}
        </a>

        <div class="job-card">
            <div class="job-header row align-items-md-center d-flex justify-content-between">
                <div class="col-md-8 d-flex align-items-center">
                    <div class="row">
                        <div class="col-10 col-md-3 d-flex justify-content-center align-items-center">
                            <img src="{{asset('upload/company/job_picture/' . $job->job_picture)}}" alt="Company Logo" class="company-logo mb-3 mt-2" >
                        </div>

                        <div class="col-md-9">
                            <div class="d-flex gap-2">
                                <h1 class="job-title">{{$job->title}} - {{$job->company->user->name}}</h1>
                            </div>
                            <div class="d-flex gap-1 flex-column">
                                <h5 class="text-muted">{{$job->address}}</h5>
                                <h5 class="text-muted">{{__('lang.lastUpdateCompanyJob')}} {{$job->updated_at->format('d F Y')}}</h5>
                                <h5 class="text-muted">{{$job->job_type}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 d-flex">
                    @if ($job->is_active == true)
                        <div class="bg-success text-light p-2 rounded-3 ms-auto">{{__('lang.openCompanyJob')}}</div>
                    @else
                        <div class="bg-danger text-light p-2 rounded-3 ms-auto">{{__('lang.closedCompanyJob')}}</div>
                    @endif
                </div>
            </div>

            <hr class="my-4">

            <div class="job-details">
                <div class="d-flex gap-2">
                    <h2 class="section-title">{{__('lang.jobDescriptionCompanyJob')}}</h2>
                </div>
                <p class="d-block">{{$job->description}}</p>

                @php
                    $requirement = explode("\r\n", $job->requirement);
                    $benefit = explode("\r\n", $job->benefit);
                @endphp

                <h2 class="fs-4 mt-4">{{__('lang.jobRequirementCompanyJob')}}</h2>
                @forelse ($requirement as $line)
                    <p class="m-0">{{$line}}</p>
                    @empty
                    <div class="alert alert-danger">
                        {{__('lang.noRequirementCompanyJob')}}
                    </div>
                @endforelse

                <h2 class="fs-4 mt-4">{{__('lang.jobBenefitCompanyJob')}}</h2>
                @forelse ($benefit as $line)
                    <p class="m-0">{{$line}}</p>
                    @empty
                    <div class="alert alert-danger">
                        {{__('lang.noBenefitCompanyJob')}}
                    </div>
                @endforelse

                <div class="mt-4 d-flex align-items-center justify-content-end gap-3">
                    <form id="deleteForm" action="{{ route('company.deleteJob', ['job' => $job->id]) }}" method="POST" onsubmit="event.preventDefault(); confirmDelete();">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-outline-danger color-danger" onclick="confirmDelete()">{{__('lang.deleteJobCompanyJob')}}</button>
                    </form>
                <a href="{{route('company.editJob', ['job' => $job->id])}}" class="btn btn-outline-primary">{{__('lang.editDetailCompanyJob')}}</a>
                </div>
            </div>
        </div>

        <div class="job-card mt-5 d-flex flex-column">
            <div class="job-header d-flex justify-content-between">
                <div class="align-self-start">
                    <h4 class="fw-bold">{{__('lang.listApplicantCompanyJob')}}</h4>
                </div>

                <div class="d-flex gap-2">
                    <form role="filter" action="{{route('company.filter', ['job' => $job, 'order' => $order, 'sort' => $sort])}}" method="GET">
                        <div class="dropdown">
                            <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropdownMenuButton1" aria-expanded="false" onclick="toggleDropdown()">
                                {{__('lang.filterCompanyJob')}}
                            </button>

                            <ul class="dropdown-menu" id="dropdownMenu" aria-labelledby="dropdownMenuButton1">
                                <li><button class="dropdown-item" name="filter" value="" type="submit">{{__('lang.allCompanyJob')}}</button></li>
                                <li><button class="dropdown-item" name="filter" value="accepted" type="submit">{{__('lang.Accepted')}}</button></li>
                                <li><button class="dropdown-item" name="filter" value="rejected" type="submit">{{__('lang.Rejected')}}</button></li>
                                <li><button class="dropdown-item" name="filter" value="pending" type="submit">{{__('lang.Pending')}}</button></li>
                            </ul>
                        </div>
                    </form>

                    <a href="{{route('company.downloadJobApplicants', ['job' => $job])}}" class="export btn btn-primary">{{__('lang.exportListCompanyJob')}}</a>
                </div>
            </div>

            <div class="mt-2 " style="overflow-x: auto; max-width: 100%;">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col" class="text-center">{{__('lang.noCompanyJob')}}</th>
                        <th scope="col" class="text-center">
                            <a href="{{route('company.job', ['job' => $job->id, 'sort' => 'users.name', 'order' => $order === 'asc' ? 'desc' : 'asc'])}}" class="text-decoration-none text-light">
                                {{__('lang.Name')}}
                                @if(request('sort') == 'users.name')
                                    @if(request('order') == 'asc')
                                        <i class="bi bi-arrow-down-short"></i>
                                    @else
                                        <i class="bi bi-arrow-up-short"></i>
                                    @endif
                                @endif
                            </a>
                        </th>

                        <th scope="col" class="text-center">
                            <a href="{{route('company.job', ['job' => $job->id, 'sort' => 'job_applications.created_at', 'order' => $order === 'asc' ? 'desc' : 'asc'])}}" class="text-decoration-none text-light">{{__('lang.appliedAtCompanyJob')}}
                                @if(request('sort') == 'job_applications.created_at')
                                    @if(request('order') == 'asc')
                                        <i class="bi bi-arrow-down-short"></i>
                                    @else
                                        <i class="bi bi-arrow-up-short"></i>
                                    @endif
                                @endif
                            </a>
                        </th>

                        <th scope="col" class="text-center">{{__('lang.applicationCVCompanyJob')}}</th>
                        <th scope="col" class="text-center">
                            <a href="{{route('company.job', ['job' => $job->id, 'sort' => 'job_applications.status', 'order' => $order === 'asc' ? 'desc' : 'asc'])}}" class="text-decoration-none text-light">
                                {{__('lang.statusCompanyJob')}}
                                @if(request('sort') == 'job_applications.status')
                                    @if(request('order') == 'asc')
                                        <i class="bi bi-arrow-down-short"></i>
                                    @else
                                        <i class="bi bi-arrow-up-short"></i>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th scope="col" class="text-center">{{__('lang.actionCompanyJob')}}</th>
                      </tr>
                    </thead>

                    <tbody class="table-group-divider">
                        @forelse ($applicants as $application)
                            <tr style="cursor: pointer">
                                <th scope="row" onclick="window.location='{{route('company.viewApplicants', ['applier' => $application->applier_id])}}'" class="text-center">{{$applicants->firstItem() + $loop->index}}</th>
                                <td onclick="window.location='{{route('company.viewApplicants', ['applier' => $application->applier_id])}}'">{{$application->name}}</td>
                                <td onclick="window.location='{{route('company.viewApplicants', ['applier' => $application->applier_id])}}'">{{$application->applied_at}}</td>
                                <td>
                                    <a href="{{asset('upload/applier/cv/' . $application->cv)}}" target="_blank" class="btn btn-primary">{{__('lang.openCVCompanyJob')}}</a>
                                </td>
                                <td id="{{'status_' . $application->job_application_id}}" onclick="window.location='{{route('company.viewApplicants', ['applier' => $application->applier_id])}}'">
                                    @if ($application->status == 'accepted')
                                        <p class="text-success fw-bold">{{__('lang.Accepted')}}</p>
                                    @elseif ($application->status == 'rejected')
                                        <p class="text-danger fw-bold">{{__('lang.Rejected')}}</p>
                                    @elseif($application->status == 'pending')
                                        <p class="text-primary fw-bold">{{__('lang.Pending')}}</p>
                                    @else
                                        <p class="text-warning fw-bold">{{__('lang.Canceled')}}</p>
                                    @endif
                                </td>

                                @if ($application->status == 'accepted' || $application->status == 'rejected' || $application->status == 'cancelled')
                                    <td class="d-flex gap-2" id="{{'action_' . $application->job_application_id}}" onclick="window.location='{{route('company.viewApplicants', ['applier' => $application->applier_id])}}'">
                                        <div class="bg-secondary text-light p-2 rounded-3" onclick="window.location='{{route('company.viewApplicants', ['applier' => $application->applier_id])}}'">{{__('lang.noneCompanyJob')}}</div>
                                    </td>
                                @else
                                    <td class="d-flex gap-2" id="{{'action_' . $application->job_application_id}}">
                                        <form id="formRejected">
                                            <input type="hidden" name="status" value="rejected">
                                            <button type="button" onclick="changeStatus('formRejected', {{$application->job_application_id}})" class="btn btn-danger">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                        </form>

                                        <form id="formAccepted">
                                            <input type="hidden" name="status" value="accepted">
                                            <button type="button" onclick="changeStatus('formAccepted', {{$application->job_application_id}})" class="btn btn-success">
                                                <i class="bi bi-check-circle"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="alert alert-danger text-center">
                                        {{__('lang.noApplicationFoundCompanyJob')}}
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{$applicants->links()}}
                </div>
            </div>
        </div>
    </div>

    <hr class="mt-5">

    @include('components.footer')
@endsection

@section('custom_script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        async function changeStatus(formId, applicationId) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const form = document.getElementById(formId);
            const formData = new FormData(form);

            const data = {};
            formData.forEach((value, key) => {
                data[key] = value;
            });

            // Tampilkan konfirmasi sebelum memperbarui status
            Swal.fire({
                title: 'Are you sure?',  // Judul konfirmasi
                text: 'Do you want to update the job application status?',  // Teks konfirmasi
                icon: 'question',  // Ikon pertanyaan
                showCancelButton: true,  // Menampilkan tombol Cancel
                confirmButtonText: 'Yes, update it!',  // Tombol konfirmasi
                cancelButtonText: 'No, cancel'  // Tombol batal
            }).then(async (swalResult) => {
                if (swalResult.isConfirmed) {
                    // Jika pengguna mengklik "Yes, update it!"
                    try {
                        const response = await fetch('/company/update/application/' + applicationId, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                            },
                            body: JSON.stringify(data),
                        });

                        if (!response.ok) {
                            throw new Error('Failed to update');
                        }

                        const result = await response.json();
                        let statusValue = `<p class="text-danger fw-bold">{{__('lang.Rejected')}}</p>`;
                        if (result.status == 'Accepted') {
                            statusValue = `<p class="text-success fw-bold">{{__('lang.Accepted')}}</p>`;
                        }

                        // Menampilkan SweetAlert konfirmasi status yang diperbarui
                        Swal.fire({
                            title: 'Job Application Status Updated',
                            html: `The application status has been updated to: ${result.status}`,
                            icon: result.status == 'Accepted' ? 'success' : 'error',
                            confirmButtonText: 'Ok'
                        });

                        // Pembaruan status di UI
                        document.getElementById('status_' + applicationId).innerHTML = statusValue;
                        document.getElementById('action_' + applicationId).innerHTML = `<div class="bg-secondary text-light p-2 rounded-3">{{__('lang.noneCompanyJob')}}</div>`;

                    } catch (error) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'There was an error updating the status.',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    }
                } else {
                    // Jika pengguna mengklik "No, cancel"
                    Swal.fire({
                        title: 'Cancelled',
                        text: 'No changes were made.',
                        icon: 'info',
                        confirmButtonText: 'Ok'
                    });
                }
            });
        }

        // Fungsi untuk menangani klik tombol konfirmasi untuk filter
        function handleButtonClick(button) {
            const filterValue = button.value; // Menangkap value dari tombol yang diklik

            Swal.fire({
                title: 'Are you sure?',
                text: `You are applying the filter: ${filterValue}`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, apply it!',
                cancelButtonText: 'No, cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengonfirmasi, kirim form
                    button.closest('form').submit(); // Mengirim form yang berisi tombol
                }
            });
        }

        function confirmDelete() {
        Swal.fire({
            title: 'Are you sure?',  // Judul konfirmasi
            text: 'Do you really want to delete this job? This action cannot be undone.',  // Pesan konfirmasi
            icon: 'warning',  // Ikon peringatan
            showCancelButton: true,  // Tombol Cancel
            confirmButtonText: 'Yes, delete it!',  // Teks tombol konfirmasi
            cancelButtonText: 'No, cancel'  // Teks tombol batal
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna mengklik 'Yes, delete it!'
                document.getElementById('deleteForm').submit();  // Kirimkan formulir untuk menghapus pekerjaan
            }
            else{
                console.log("No Action")
            }
        });
    }

    </script>
@endsection
