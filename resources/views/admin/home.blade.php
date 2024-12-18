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
        @media (max-width: 768px) {
            .endDate{
                margin-top: 0.6rem;
            }
            .button{
                margin-top: 0.6rem;
            }
        }
    </style>
@endsection

@section('content')
    @include('components.navbar')
    <!-- Content -->
    <div class="container mt-4">
        <div class="card p-4 custom-bg">
            <h4 class="text-start mb-4">{{__('lang.Welcome Back')}}, <span class="fw-bold" style= "color: #682b90;">Admin!</span></h4>

            <!-- Statistics -->
            <div class="row g-2 p-3 mb-4 bg-light shadow-lg rounded border">
                <div class="col-12 col-md-6">
                    <div class="card card-stats bg-gradient-primary text-start p-3  text-white" style="height: 150px;">
                        <h6>{{__('lang.This Month Income')}}</h6>
                        <h2 class="fs-3 fw-bold">IDR. {{number_format($monthRevenue)}}</h2>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card card-stats bg-gradient-success text-start p-3 text-white " style="height: 150px;">
                        <h6>{{__('lang.Total Income')}}</h6>
                        <h2 class="fs-3 fw-bold">IDR. {{number_format($totalRevenue)}}</h2>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card card-stats bg-gradient-info text-start p-3 text-white" style="height: 150px;">
                        <h6>{{__('lang.Total Applier')}}</h6>
                        <h2 class="fs-3 fw-bold">{{number_format($totalApplier)}}</h2>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card card-stats bg-gradient-danger text-start p-3 text-white" style="height: 150px;">
                        <h6>{{__('lang.Total Company')}}</h6>
                        <h2 class="fs-3 fw-bold">{{number_format($totalCompany)}}</h2>
                    </div>
                </div>
            </div>

            <div class="mb-4 d-flex flex-column align-items-center">
                <h5>{{__('lang.Website Income')}}</h5>

                <div class="row g-3 align-items-end">
                    <div class="col-12 col-md-6">
                        <label for="inputDateFrom" class="form-label">{{__('lang.From')}}</label>
                        <input type="date" class="form-control" id="inputDateFrom" name="start_date" onchange="checkRevenue()">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="inputDateTo" class="form-label">{{__('lang.To')}}</label>
                        <input type="date" class="form-control" id="inputDateTo" name="end_date" onchange="checkRevenue()">
                    </div>

                    <div class="col-12">
                        <div class="card card-stats bg-gradient-danger text-start p-3 text-white text-center" style="height: 150px;">
                            <h6>{{__('lang.Total Income')}}</h6>
                            <h2 class="fs-3 fw-bold" id="revenue_range">{{number_format($totalRevenue)}}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <h5>{{__('lang.List of All Premium Users')}}</h5>
                <div class="row g-3 align-items-end">
                    <form action="{{route('admin.home')}}" method="GET" class="d-flex flex-wrap">
                        <div class="col-12 col-md-3">
                            <input type="date" class="form-control" id="inputDateFromPremium" name="start_premium" value="{{request('start_premium')}}">
                        </div>

                        <div class="col-12 col-md-3">
                            <input type="date" style="gap: 1.5rem" class="endDate form-control" id="inputDateToPremium" name="end_premium" value="{{request('end_premium')}}">
                        </div>

                        <div class="button col-12 col-md-6 d-flex" style="gap: 0.5rem">
                            <button class="btn btn-secondary w-50 ms-3" type="submit">{{__('lang.Search')}}</button>
                            <button class="btn btn-primary w-50" onclick="exportIncome()">{{__('lang.Export All Users')}}</button>
                        </div>
                    </form>
                </div>
            </div>

            <div >
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center"><a href="{{route('admin.home', ['sort' => 'users.name', 'order' => $order == 'asc' ? 'desc' : 'asc'])}}" class="text-decoration-none text-light">{{__('lang.Name')}}</a></th>
                                <th scope="col" class="text-center"><a href="{{route('admin.home', ['sort' => 'user_histories.price', 'order' => $order == 'asc' ? 'desc' : 'asc'])}}" class="text-decoration-none text-light">{{__('lang.Revenue')}}</a></th>
                                <th scope="col" class="text-center"><a href="{{route('admin.home', ['sort' => 'user_histories.start_date', 'order' => $order == 'asc' ? 'desc' : 'asc'])}}" class="text-decoration-none text-light">{{__('lang.Start')}}</a></th>
                                <th scope="col" class="text-center"><a href="{{route('admin.home', ['sort' => 'user_histories.end_date', 'order' => $order == 'asc' ? 'desc' : 'asc'])}}" class="text-decoration-none text-light">{{__('lang.End')}}</a></th>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                            @forelse ($listPremium as $premiumApplier)
                                <tr style="cursor: pointer">
                                    <th scope="row" onclick="window.location='{{route('company.viewApplicants', ['applier' => $premiumApplier->applier_id])}}'">{{$listPremium->firstItem() + $loop->index}}</th>
                                    <td onclick="window.location='{{route('company.viewApplicants', ['applier' => $premiumApplier->applier_id])}}'">{{$premiumApplier->name}}</td>
                                    <td onclick="window.location='{{route('company.viewApplicants', ['applier' => $premiumApplier->applier_id])}}'">{{number_format($premiumApplier->price)}}</td>
                                    <td onclick="window.location='{{route('company.viewApplicants', ['applier' => $premiumApplier->applier_id])}}'">{{$premiumApplier->start_date}}</td>
                                    <td onclick="window.location='{{route('company.viewApplicants', ['applier' => $premiumApplier->applier_id])}}'">{{$premiumApplier->end_date}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="alert alert-danger text-center">
                                            {{__('lang.No Premium User Found')}}
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


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

            const fromDate = new Date(dateFrom);
            const toDate = new Date(dateTo);

            // Check if dateFrom is greater than dateTo
            if (fromDate > toDate) {
                alert('The "From" date cannot be later than the "To" date.');
                document.getElementById('inputDateTo').value = null;
                return;
            }

            try {
                const response = await fetch(`/admin/range-revenue?dateFrom=${dateFrom}&dateTo=${dateTo}`);
                if(!response.ok){
                    throw new Error('Something went wrong');
                }

                const data = await response.json();
                const formattedRevenue = new Intl.NumberFormat('en-US').format(data.rangeRevenue);

                document.getElementById('revenue_range').innerText = `IDR. ${formattedRevenue}`;
            } catch (error) {
                console.error(error);
            }
        }

        async function exportIncome(){
            const dateFrom = document.getElementById('inputDateFromPremium').value;
            const dateTo = document.getElementById('inputDateToPremium').value;

            if(dateFrom === '' || dateTo === '') {
                alert('Please fill the date range.');
                return;
            };

            const fromDate = new Date(dateFrom);
            const toDate = new Date(dateTo);

            // Check if dateFrom is greater than dateTo
            if (fromDate > toDate) {
                alert('The "From" date cannot be later than the "To" date.');
                document.getElementById('inputDateTo').value = null;
                return;
            }

            let url = `/admin/premium/data?dateFrom=${dateFrom}&dateTo=${dateTo}`;
            try {
                const response = await fetch(url);
                if(!response.ok){
                    throw new Error('Something went wrong');
                }
            } catch (error) {
                console.error(error);
            }
            window.location.href = url;
        }
    </script>
@endsection
