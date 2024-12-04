@extends('layouts.app')

@section('title', 'Admin Home')

@section('content')
    @include('components.navbar')

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
</head>
<body>
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
            <div class="mb-4">
                <h5>Website Income</h5>
                <div class="row g-3 align-items-end">
                    <div class="col-12 col-md-3">
                        <label for="inputDateFrom" class="form-label">From</label>
                        <input type="date" class="form-control" id="inputDateFrom">
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="inputDateTo" class="form-label">To</label>
                        <input type="date" class="form-control" id="inputDateTo">
                    </div>
                    <div class="col-12 col-md-3">
                        <button class="btn btn-secondary w-100">Search</button>
                    </div>
                    <div class="col-12 col-md-3">
                        <button class="btn btn-primary w-100">Export All Income</button>
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
    <div class="header d-flex justify-content-between align-items-center py-2">
        <div class="col text-start"><strong>No</strong></div>
        <div class="col text-start"><strong>Name</strong></div>
        <div class="col text-center"><strong>Revenue</strong></div>
        <div class="col text-center"><strong>Start Date</strong></div>
        <div class="col text-center"><strong>End Date</strong></div>
    </div>

<div class="premium-list">
    @forelse ($listPremium as $premiumApplier)
        <div class="premium-item d-flex justify-content-between align-items-center border-bottom py-2">
            <div class="col">{{$listPremium->firstItem() + $loop->index}}</div>
            <div class="col">{{$premiumApplier->name}}</div>
            <div class="col text-center">{{number_format($premiumApplier->price)}}</div>
            <div class="col text-center">{{$premiumApplier->start_date}}</div>
            <div class="col text-center">{{$premiumApplier->end_date}}</div>
        </div>
    @empty
        <div class="alert alert-danger text-center">
            No premium user found.
        </div>
    @endforelse
</div>
</div>
    @include('components.footer')
@endsection
