@extends('layouts.app')

@section('title', 'Job Listings - Company View')

@section('custom_css')
<style>
    @media(min-width:768px){
        .dropdown-menu{
            margin-left: 210px
        }
    }
    @media (max-width: 767px) {
        .dropdown-menu {
            position: absolute;
            right: 0;
            left: auto;
        }
    }
</style>
@endsection


@section('content')
    @include('components.navbar')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <h2 class="mb-4 my-auto">{{__('lang.titleListJob')}}</h2>

            <div>
                <form class="" role="search" action="{{route('company.searchJobs')}}" method="GET">
                    <div class="d-md-flex dropdown text-end">
                        <input class="form-control mb-2 mb-md-0 me-md-2" name="search" placeholder="{{__('lang.searchPHListJob')}}" value="{{ request('search') }}">

                        <button class="btn btn-outline-primary dropdown-toggle me-md-2 mb-2 mb-md-0" type="button" id="dropdownMenuButton1" onclick="toggleDropdown()">
                            {{__('lang.filterListJob')}}
                        </button>

                        <ul class="dropdown-menu mt-md-5  p-2" id="dropdownMenu" aria-labelledby="dropdownMenuButton" >
                            <li class="form-group">
                                <ul class="list-unstyled">
                                    <label class="fw-bold">Job Type</label>
                                    <li><input class="form-check-input" name="job_type[]" type="checkbox" value="Full Time" id="checkFulltime"
                                        @if(in_array('Full-time', request('job_type', []))) checked @endif>
                                        <label class="form-check-label" for="checkFulltime">
                                            {{__('lang.fullTimeListJob')}}
                                        </label>
                                    </li>
                                    <li><input class="form-check-input" name="job_type[]" type="checkbox" value="Part Time" id="checkParttime"
                                        @if(in_array('Part Time', request('job_type', []))) checked @endif>
                                        <label class="form-check-label" for="checkParttime">
                                            {{__('lang.partTimeListJob')}}
                                        </label>
                                    </li>

                                    <li><input class="form-check-input" name="job_type[]" type="checkbox" value="Internship" id="checkInternship"
                                        @if(in_array('Internship', request('job_type', []))) checked @endif>
                                        <label class="form-check-label" for="checkInternship">
                                            {{__('lang.internshipListJob')}}
                                        </label>
                                    </li>
                                    <li><input class="form-check-input" name="job_type[]" type="checkbox" value="Freelance" id="checkFreelance"
                                        @if(in_array('Freelance', request('job_type', []))) checked @endif>
                                        <label class="form-check-label" for="checkFreelance">
                                            Freelance
                                        </label>
                                    </li>
                                </ul>
                            </li>

                            <li class="form-group">
                                <ul class="list-unstyled">
                                    <label class="fw-bold">{{__('lang.statusListJob')}}</label>
                                    <li><input class="form-check-input" name="is_active[]" type="checkbox" value="1" id="checkOpen"
                                        @if(in_array('1', request('is_active', []))) checked @endif>
                                        <label class="form-check-label" for="checkOpen">
                                            {{__('lang.openListJob')}}
                                        </label>
                                    </li>
                                    <li><input class="form-check-input" name="is_active[]" type="checkbox" value="0" id="checkOpen"
                                        @if(in_array('0', request('is_active', []))) checked @endif>
                                        <label class="form-check-label" for="checkOpen">
                                            {{__('lang.closedListJob')}}
                                        </label>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <button class="btn btn-outline-success mb-2 mb-md-0" type="submit">{{__('lang.searchListJob')}}</button>
                    </div>
                </form>
            </div>
        </div>



        <div class="mt-4 mb-3">
            <a href="{{route('company.createJobPage')}}" class="btn btn-success mb-3">{{__('lang.addNewJobListJob')}}</a>
        </div>
        <div class="row">
            @forelse ($jobs as $job)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow h-100">
                        <img src="{{asset('upload/company/job_picture/' . $job->job_picture)}}" alt="Job Image" class="card-img-top">
                        <div class="card-body d-flex flex-column align-items">
                            <h5 class="card-title">{{$job->title}}</h5>
                            <p class="card-subtitle text-muted mb-3">{{$job->job_type}} /
                                @if ($job->is_active == true)
                                    <span class="border bg-success text-light rounded px-1 d-inline-block shadow-sm">
                                        {{__('lang.openListJob')}}
                                    </span>
                                @else
                                    <span class="border bg-danger text-light rounded px-1 d-inline-block shadow-sm">
                                        {{__('lang.closedListJob')}}
                                    </span>
                                @endif
                            </p>

                            <p class="mb-1"><strong>{{__('lang.companyListJob')}}</strong> {{Auth::user()->name}}</p>
                            <p class="mb-1"><strong>{{__('lang.locationListJob')}} </strong>{{$job->address}}</p>
                            <p class="text-truncate mb-1"><strong>{{__('lang.descriptionListJob')}} </strong>{{$job->description}}</p>
                            <p class="mb-1"><strong>{{__('lang.personInChargeListJob')}} </strong>{{$job->person_in_charge}}</p>
                            <p class="mb-1"><strong>{{__('lang.lastUpdatedListJob')}} </strong>{{$job->updated_at->format('d F Y')}}</p>

                            <a href="{{route('company.job', ['job' => $job])}}" class="btn btn-primary mt-auto">{{__('lang.detailsListJob')}}</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">
                    {{__('lang.noJobListingListJob')}}
                </div>
            @endforelse
        </div>
    </div>

    @include('components.footer')
@endsection

@section('custom_script')

    <script>
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
