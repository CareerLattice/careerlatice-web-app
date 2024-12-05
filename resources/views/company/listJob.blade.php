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
            <h2 class="mb-4">{{__('company/listJob.title')}}</h2>

            <div class="">
                
                <form class="" role="search" action="{{route('company.searchJobs')}}" method="GET">
                    <div class="d-md-flex dropdown text-end">
                        <input style="" class="form-control mb-2 mb-md-0 me-md-2" name="search" placeholder="{{__('company/listJob.searchPH')}}" value="{{ request('search') }}">
                        
                        <button class="btn btn-outline-primary dropdown-toggle me-md-2 mb-2 mb-md-0" type="button" id="dropdownMenuButton1" onclick="toggleDropdown()">
                            {{__('company/listJob.filter')}}
                        </button>
                        
                        <ul class="dropdown-menu mt-md-5  p-2" id="dropdownMenu" aria-labelledby="dropdownMenuButton" >
                            <li class="form-group">
                                <ul class="list-unstyled">
                                    <label class="fw-bold">{{__('company/listJob.jobType')}}</label>
                                    <li><input class="form-check-input" name="job_type[]" type="checkbox" value="Full Time" id="checkFulltime" 
                                        @if(in_array('Full Time', request('job_type', []))) checked @endif>
                                        <label class="form-check-label" for="checkFulltime">
                                            {{__('company/listJob.fullTime')}}
                                        </label>
                                    </li>
                                    <li><input class="form-check-input" name="job_type[]" type="checkbox" value="Part Time" id="checkParttime"
                                        @if(in_array('Part Time', request('job_type', []))) checked @endif>
                                        <label class="form-check-label" for="checkParttime">
                                            {{__('company/listJob.partTime')}}
                                        </label>
                                    </li>
                                    <li><input class="form-check-input" name="job_type[]" type="checkbox" value="Internship" id="checkInternship"
                                        @if(in_array('Internship', request('job_type', []))) checked @endif>
                                        <label class="form-check-label" for="checkInternship">
                                            {{__('company/listJob.internship')}}
                                        </label>
                                    </li>
                                </ul>
                            </li>

                            <li class="form-group">
                                <ul class="list-unstyled">
                                    <label class="fw-bold">{{__('company/listJob.status')}}</label>
                                    <li><input class="form-check-input" name="is_active[]" type="checkbox" value="1" id="checkOpen"
                                        @if(in_array('1', request('is_active', []))) checked @endif>
                                        <label class="form-check-label" for="checkOpen">
                                            {{__('company/listJob.open')}}
                                        </label>
                                    </li>
                                    <li><input class="form-check-input" name="is_active[]" type="checkbox" value="0" id="checkOpen"
                                        @if(in_array('0', request('is_active', []))) checked @endif>
                                        <label class="form-check-label" for="checkOpen">
                                            {{__('company/listJob.closed')}}
                                        </label>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        
                        <button class="btn btn-outline-success mb-2 mb-md-0" type="submit">{{__('company/listJob.search')}}</button>
                    </div>
                </form>

            </div>

        </div>

        

        <div class="mt-4 mb-3">
            <a href="{{route('company.createJobPage')}}" class="btn btn-success mb-3">{{__('company/listJob.addNewJob')}}</a>
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
                                        {{__('company/listJob.open')}}
                                    </span>
                                @else
                                    <span class="border bg-danger text-light rounded px-1 d-inline-block shadow-sm">
                                        {{__('company/listJob.closed')}}
                                    </span>
                                @endif
                            </p>

                            <p class="mb-1"><strong>{{__('company/listJob.company')}}</strong> {{Auth::user()->name}}</p>
                            <p class="mb-1"><strong>{{__('company/listJob.location')}} </strong>{{$job->address}}</p>
                            <p class="text-truncate mb-1"><strong>{{__('company/listJob.description')}} </strong>{{$job->description}}</p>
                            <p class="mb-1"><strong>{{__('company/listJob.personInCharge')}} </strong>{{$job->person_in_charge}}</p>
                            <p class="mb-1"><strong>{{__('company/listJob.lastUpdated')}} </strong>{{$job->updated_at->format('d F Y')}}</p>

                            <a href="{{route('company.job', ['job' => $job])}}" class="btn btn-primary mt-auto">{{__('company/listJob.details')}}</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">
                    {{__('company/listJob.noJobListing')}}
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