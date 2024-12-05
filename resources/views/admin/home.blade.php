@extends('layouts.app')

@section('title', 'Admin Home')

@section('custom_css')
    <style>
        .bg-gradient-primary {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
        }

        .bg-gradient-success {
            background: linear-gradient(135deg, #11998e, #38ef7d);
        }

        .bg-gradient-info {
            background: linear-gradient(135deg, #396afc, #2948ff);
        }

        .bg-gradient-danger {
            background: linear-gradient(135deg, #ff416c, #ff4b2b);
        }

        .card-stats:hover {
            transform: scale(1.02);
            transition: transform 0.3s ease;
        }

        .card-stats h6 {
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }
    </style>
@endsection

@section('content')
    @include('components.navbar')
    <!-- Content -->
    <div class="container mt-4">
        <div class="card p-4 custom-bg">
            <h4 class="text-start mb-4">Welcome back,<span class="fw-bold" style= "color: #682b90;"> Admin! </span></h4>

            <!-- Statistics -->
            <div class="row g-2 p-3 mb-4 bg-light shadow-lg rounded border">
                <div class="col-12 col-md-6">
                    <div class="card card-stats bg-gradient-primary text-start p-3  text-white" style="height: 150px;">
                        <h6>This Month Income</h6>
                        <h2 class="fs-3 fw-bold">IDR. {{number_format($monthRevenue)}}</h2>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card card-stats bg-gradient-success text-start p-3 text-white " style="height: 150px;">
                        <h6>Total Income</h6>
                        <h2 class="fs-3 fw-bold">IDR. {{number_format($totalRevenue)}}</h2>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card card-stats bg-gradient-info text-start p-3 text-white" style="height: 150px;">
                        <h6>Total Applier</h6>
                        <h2 class="fs-3 fw-bold">{{number_format($totalApplier)}}</h2>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card card-stats bg-gradient-danger text-start p-3 text-white" style="height: 150px;">
                        <h6>Total Company</h6>
                        <h2 class="fs-3 fw-bold">{{number_format($totalCompany)}}</h2>
                    </div>
                </div>
            </div>

            <!-- Website Income -->
            <div class="mb-4 d-flex flex-column align-items-center">
                <h5>Website Income</h5>
                <div class="row g-3 align-items-end">
                    <div class="col-12 col-md-6">
                        <label for="inputDateFrom" class="form-label">From</label>
                        <input type="date" class="form-control" id="inputDateFrom" onchange="checkRevenue()">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="inputDateTo" class="form-label">To</label>
                        <input type="date" class="form-control" id="inputDateTo" onchange="checkRevenue()">
                    </div>

                    <div class="col-12">
                        <div class="card card-stats bg-gradient-danger text-start p-3 text-white text-center" style="height: 150px;">
                            <h6>Total Income</h6>
                            <h2 class="fs-3 fw-bold" id="revenue_range">{{number_format($totalCompany)}}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <h5>List of All Premium Users</h5>
                <div class="row g-3 align-items-end">
                    <div class="col-12 col-md-3">
                        <label for="inputDateFromPremium" class="form-label">From</label>
                        <input type="date" class="form-control" id="inputDateFromPremium">
                    </div>

                    <div class="col-12 col-md-3">
                        <label for="inputDateToPremium" class="form-label">To</label>
                        <input type="date" class="form-control" id="inputDateToPremium">
                    </div>

                    <div class="col-12 col-md-3">
                        <button class="btn btn-secondary w-100">Search</button>
                    </div>

                    <div class="col-12 col-md-3">
                        <button class="btn btn-primary w-100">Export All Users</button>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="mt-2">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Revenue</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider">
                        @forelse ($listPremium as $premiumApplier)
                            <tr style="cursor: pointer">
                                <th scope="row" onclick="window.location='{{route('company.viewApplicants', ['applier' => $premiumApplier->applier_id])}}'">{{$listPremium->firstItem() + $loop->index}}</th>
                                <td onclick="window.location='{{route('company.viewApplicants', ['applier' => $premiumApplier->applier_id])}}'">{{$premiumApplier->name}}</td>
                                <td onclick="window.location='{{route('company.viewApplicants', ['applier' => $premiumApplier->applier_id])}}'">{{$premiumApplier->price}}</td>
                                <td onclick="window.location='{{route('company.viewApplicants', ['applier' => $premiumApplier->applier_id])}}'">{{$premiumApplier->start_date}}</td>
                                <td onclick="window.location='{{route('company.viewApplicants', ['applier' => $premiumApplier->applier_id])}}'">{{$premiumApplier->end_date}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="alert alert-danger text-center">
                                        No Premium User Found.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{$listPremium->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
@endsection


@section('custom_script')
    <script>
        async function checkRevenue(){
            const dateFrom = document.getElementById('inputDateFrom').value;
            const dateTo = document.getElementById('inputDateTo').value;
            if(dateFrom === '' || dateTo === '') return;

            try {
                const response = await fetch(`/admin/revenue?dateFrom=${dateFrom}&dateTo=${dateTo}`);

                if(!response.ok){
                    throw new Error('Something went wrong');
                }

                const data = await response.json();
                document.getElementById('revenue_range').innerText = `IDR. ${data.revenue}`;
            } catch (error) {
                console.error(error);
            }
        }
    </script>
@endsection
