@extends('layouts.app')

@section('title', 'Add New Job')

@section('content')
    @include('components.navbar')
    <div class="container my-5">
        <h2 class="mb-4">{{__('company/companyLang.titleCreateJob')}}</h2>
        <a href="{{route('company.listJob')}}" class="text-primary text-decoration-none mb-4 d-inline-block">
            <i class="bi bi-arrow-left-circle"></i> {{__('company/companyLang.backCreateJob')}}
        </a>

        <form action="{{route('company.createJob')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">{{__('company/companyLang.jobTitleCreateJob')}}</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">{{__('company/companyLang.jobLocationCreateJob')}}</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">{{__('company/companyLang.jobDescriptionCreateJob')}}</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="requirement" class="form-label">{{__('company/companyLang.jobRequirementCreateJob')}}</label>
                <textarea class="form-control" id="requirement" name="requirement" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="job_type" class="form-label">{{__('company/companyLang.jobTypeCreateJob')}}</label>
                <select class="form-select" id="job_type" name="job_type" required>
                    <option value="Full-time">{{__('company/companyLang.fullTimeCreateJob')}}</option>
                    <option value="Part-time">{{__('company/companyLang.partTimeCreateJob')}}</option>
                    <option value="Internship">{{__('company/companyLang.internshipCreateJob')}}</option>
                    <option value="Freelance">Freelance</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="person_in_charge" class="form-label">{{__('company/companyLang.personInChargeCreateJob')}}</label>
                <input type="text" class="form-control" id="person_in_charge" name="person_in_charge" required>
            </div>

            <div class="mb-3">
                <label for="contact_person" class="form-label">{{__('company/companyLang.contactPersonCreateJob')}}</label>
                <input type="tel" textarea class="form-control" id="contact_person" name="contact_person" rows="1" required></textarea>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{$errors->first()}}
                </div>
            @endif
            <button type="submit" class="btn btn-success">{{__('company/companyLang.addJobCreateJob')}}</button>
        </form>
    </div>
    @include('components.footer')
@endsection
