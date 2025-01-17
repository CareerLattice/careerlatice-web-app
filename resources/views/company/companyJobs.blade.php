@extends('layouts.app')

@section('title', 'Company Jobs')

@section('content')
    <div class="container mt-5">
        <div class="row">
            @forelse ($jobs as $job)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header {{$job->is_active == true ? 'bg-success':'bg-danger'}}">
                            <h5 class="card-title text-light">
                                {{$job->title}}
                            </h5>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="alert alert-warning">
                        {{__('lang.noJobsAvailableCompanyJobs')}}
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
