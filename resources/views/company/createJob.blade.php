@extends('layouts.app')

@section('title', 'Add New Job')

@section('content')
    @include('components.navbar')
    <div class="container my-5">
        <h2 class="mb-4">{{__('company/createJob.title')}}</h2>
        <a href="{{route('company.listJob')}}" class="text-primary text-decoration-none mb-4 d-inline-block">
            <i class="bi bi-arrow-left-circle"></i> {{__('company/createJob.back')}}
        </a>

        <form action="{{route('company.createJob')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">{{__('company/createJob.jobTitle')}}</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">{{__('company/createJob.jobLocation')}}</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">{{__('company/createJob.jobDescription')}}</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="requirement" class="form-label">{{__('company/createJob.jobRequirement')}}</label>
                <textarea class="form-control" id="requirement" name="requirement" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="job_type" class="form-label">{{__('company/createJob.jobType')}}</label>
                <select class="form-select" id="job_type" name="job_type" required>
                    <option value="Full-time">{{__('company/createJob.fullTime')}}</option>
                    <option value="Part-time">{{__('company/createJob.partTime')}}</option>
                    <option value="Internship">{{__('company/createJob.internship')}}</option>
                    <option value="Freelance">Freelance</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="person_in_charge" class="form-label">{{__('company/createJob.personInCharge')}}</label>
                <input type="text" class="form-control" id="person_in_charge" name="person_in_charge" required>
            </div>

            <div class="mb-3">
                <label for="contact_person" class="form-label">{{__('company/createJob.contactPerson')}}</label>
                <input type="tel" textarea class="form-control" id="contact_person" name="contact_person" rows="1" required></textarea>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{$errors->first()}}
                </div>
            @endif
            <button type="submit" class="btn btn-success">{{__('company/createJob.addJob')}}</button>
        </form>
    </div>
    @include('components.footer')
@endsection
