@extends('layouts.app')

@section('title', 'Admin Home')

@section('content')
    @include('components.navbar')

    <div class="container p-4 my-3" style="border-radius: 12px; background-color: #ffffff">
        <h4 class="text-center text-md-start fw-bold pb-2" style="color: #682b90">Welcome back, Admin!</h4>
        <hr class="my-2">
        <div class="row align-items-center my-4">
            <div class="col-12 col-md-6">
                <h5 class="mb-3">Website Income</h5>
            </div>
            <div class="col-12 col-md-9">
                <div class="row g-2 align-items-end">
                    <div class="col-12 col-md-3">
                        <h6 class="mb-1">From</h6>
                        <input type="date" class="form-control" id="inputDateFrom" name="from">
                    </div>
                    <div class="col-12 col-md-3">
                        <h6 class="mb-1">To</h6>
                        <input type="date" class="form-control" id="inputDateTo" name="to">
                    </div>
                    <div class="col-12 col-md-3">
                        <a href="" class="btn btn-secondary w-100">Search</a>
                    </div>
                    <div class="col-12 col-md-3">
                        <a href="" class="btn btn-primary w-100">Export All Income</a>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <h5>This Month Income</h5>
                <h1 style="color: #682b90">IDR. {{number_format($monthRevenue)}}</h1>
            </div>
            <div class="mt-4">
                <h5>Total Income</h5>
                <h1 style="color: #682b90">IDR. {{number_format($totalRevenue)}}</h1>
            </div>
            <div class="mt-4">
                <h5>Total Applier</h5>
                <h1 style="color: #682b90">{{number_format($totalApplier)}}</h1>
            </div>
            <div class="mt-4">
                <h5>Total Company</h5>
                <h1 style="color: #682b90">{{number_format($totalCompany)}}</h1>
            </div>
        </div>
        <hr class="mt-5 mb-2">
        <div class="row align-items-center my-4">
            <div class="col-12 col-md-6">
                <h5 class="mb-3">List of all Premium User</h5>
            </div>
            <div class="col-12 col-md-9">
                <div class="row g-2 align-items-end">
                    <div class="col-12 col-md-3">
                        <h6 class="mb-1">From</h6>
                        <input type="date" class="form-control" id="inputDateFrom" name="from">
                    </div>
                    <div class="col-12 col-md-3">
                        <h6 class="mb-1">To</h6>
                        <input type="date" class="form-control" id="inputDateTo" name="to">
                    </div>
                    <div class="col-12 col-md-3">
                        <a href="" class="btn btn-secondary w-100">Search</a>
                    </div>
                    <div class="col-12 col-md-3">
                        <a href="" class="btn btn-primary w-100">Export All User</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="list-applicant">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Revenue</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($listPremium as $premiumApplier)
                        <tr>
                            <th scope="row">{{$listPremium->firstItem() + $loop->index}}</th>
                            <td>{{$premiumApplier->name}}</td>
                            <td>{{$premiumApplier->price}}</td>
                            <td>{{$premiumApplier->start_date}}</td>
                            <td>{{$premiumApplier->end_date}}</td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">
                            No premium user found.
                        </div>
                    @endforelse
                </tbody>
            </table>
            {{$listPremium->links()}}
        </div>
    </div>

    @include('components.footer')
@endsection
