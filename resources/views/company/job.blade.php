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
                    <form action="{{route('company.deleteJob', ['job' => $job->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger color-danger">{{__('lang.deleteJobCompanyJob')}}</button>
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
                    <form role="filter" action="{{route('company.filter', ['job' => $job])}}" method="GET">
                        <div class="dropdown">
                            <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropdownMenuButton1" aria-expanded="false" onclick="toggleDropdown()">
                                {{__('lang.filterCompanyJob')}}
                            </button>

                        <ul class="dropdown-menu" id="dropdownMenu" aria-labelledby="dropdownMenuButton1">
                            <li><button class="dropdown-item" name="filter" value="" type="submit">{{__('lang.allCompanyJob')}}</button></li>
                            <li><button class="dropdown-item" name="filter" value="accepted" type="submit">{{__('lang.acceptedCompanyJob')}}</button></li>
                            <li><button class="dropdown-item" name="filter" value="rejected" type="submit">{{__('lang.rejectedCompanyJob')}}</button></li>
                            <li><button class="dropdown-item" name="filter" value="pending" type="submit">{{__('lang.pendingCompanyJob')}}</button></li>
                        </ul>
                    </div>
                </form>

                    <a href="{{route('company.downloadJobApplicants', ['job' => $job])}}" class="btn btn-primary">{{__('lang.exportListCompanyJob')}}</a>
                </div>
            </div>

            <div class="mt-2">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col" class="text-center">{{__('lang.noCompanyJob')}}</th>
                        <th scope="col" class="text-center">
                            <a href="{{route('company.job', ['job' => $job->id, 'sort' => 'users.name', 'order' => $order === 'asc' ? 'desc' : 'asc'])}}" class="text-decoration-none text-light">
                                {{__('lang.nameCompanyJob')}}
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
                                        <p class="text-success fw-bold">{{__('lang.acceptedCompanyJob')}}</p>
                                    @elseif ($application->status == 'rejected')
                                        <p class="text-danger fw-bold">{{__('lang.rejectedCompanyJob')}}</p>
                                    @elseif($application->status == 'pending')
                                        <p class="text-primary fw-bold">{{__('lang.pendingCompanyJob')}}</p>
                                    @else
                                        <p class="text-primary fw-bold">{{__('lang.cancelledCompanyJob')}}</p>
                                    @endif
                                </td>

                                @if ($application->status == 'accepted' || $application->status == 'rejected')
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
    <script>
        async function changeStatus(formId, applicationId) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const form = document.getElementById(formId);
            const formData = new FormData(form);

            const data = {};
            formData.forEach((value, key) => {
                data[key] = value;
            });

            try {
                const response = await fetch('/company/update/application/'+ applicationId, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify(data),
                });

                if (!response.ok) {
                    throw new Error(`Error`);
                }

                const result = await response.json();
                let statusValue = `<p class="text-danger fw-bold">{{__('lang.rejectedCompanyJob')}}</p>`;
                if (result.status == 'Accepted') {
                    statusValue = `<p class="text-success fw-bold">{{__('lang.acceptedCompanyJob')}}</p>`;
                }

                alert('Job Application Status Updated to ' + result.status);
                document.getElementById('status_' + applicationId).innerHTML = statusValue;
                document.getElementById('action_' + applicationId).innerHTML = `<div class="bg-secondary text-light p-2 rounded-3">{{__('lang.noneCompanyJob')}}</div>`;
            } catch (error) {
                console.error(error);
            }
        }


        function toggleDropdown() {
            var dropdownMenu = document.getElementById('dropdownMenu');
            var isOpen = dropdownMenu.classList.contains('show');

            if (isOpen) {
                dropdownMenu.classList.remove('show');
            } else {
                dropdownMenu.classList.add('show');
            }

        }

        window.addEventListener('click', function(event) {
            var dropdownMenu = document.getElementById('dropdownMenu');
            var button = document.getElementById('dropdownMenuButton1');

            if (!button.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    </script>
@endsection

