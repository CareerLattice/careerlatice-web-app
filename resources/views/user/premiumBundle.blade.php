@extends('layouts.app')

@section('title', 'Upgrade Now')

@section('custom_css')
    <style>
        .badge {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
        }

        .card:hover {
            transform: translateY(-5px);
            transition: 0.3s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .plan-card {
            display: flex;
            flex-direction: column;
            height: 100%;
            border-radius: 12px;
            background-color: #f8f9fa;
            justify-content: space-between;
        }

        .plan-card form{
            margin-top: auto;
        }

        .banner-container {
            position: relative;
            overflow: hidden;
        }

        .banner-img {
            object-fit: cover;
            width: 100%;
            height: 35vh;
            max-height: 400px;
        }

        .bannerText {
            text-align: center;
            padding: 0 1rem;
        }

        .banner-title {
            font-size: 2rem;
        }

        @media (max-width: 768px) {
            .banner-img {
                height: 25vh;
                max-height: 300px;
            }

            .banner-title {
                font-size: 1.5rem;
            }

            .bannerText {
                padding: 0 0.5rem;
            }
        }

        @media (max-width: 576px) {
            .banner-img {
                height: 20vh;
                max-height: 250px;
            }

            .banner-title {
                font-size: 1.2rem;
            }

            .bannerText {
                padding: 0 0.25rem;
            }
        }

    </style>
@endsection

@section('content')
    @include('components.navbar')

    <div class="position-relative banner-container">
        <img src="{{asset('assets/premiumBanner.jpg')}}" alt="Company Cover" class="img-fluid w-100 banner-img">
        <div class="bannerText position-absolute top-50 start-50 translate-middle text-center text-white px-4">
            <h1 class="fw-medium">{{__('lang.Explore Exciting')}} <span style="color: gold">{{__('lang.bundle')}}</span> {{__('lang.and')}} <span style="color: gold">{{__('lang.benefit')}}</span></h1>
            <h1 class="fw-medium">{{__('lang.careerLattice')}}</h1>
        </div>
    </div>

    <div class="container mt-5 mb-3">
        <h1 class="fw-bold text-center mb-2">{{__('lang.choose')}} <span style="color: gold;">{{__('lang.plan')}}</span> ✨</h1>
        <p class="text-center text-muted mb-5 mt-1">{{__('lang.unlockPremium')}}</p>

        <div class="row justify-content-center align-items-stretch">
            <!-- Essential Plan -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card p-4 shadow position-relative plan-card">
                    <span class="badge bg-primary position-absolute top-0 start-50 translate-middle mt-4">3 {{__('lang.planMonthly')}}</span>
                    <h3 class="fw-bold text-center mt-4">Essential</h3>
                    <p class="price fw-bold text-center mb-1" style="font-size: 2rem;">Rp 1.499.000<span style="font-size: 1rem;" class="text-muted">/3 months</span></p>
                    <p class="text-center text-muted">{{__('lang.saveMonth5')}}</p>
                    <p class="mb-2">
                        ✅ {{__('lang.startingOut')}}<br>
                        ✅ {{__('lang.accessFeatures')}}<br>
                        ✅ {{__('lang.long-term')}}<br>
                    </p>
                    <p>{{__('lang.getStarted')}}</p>
                    <form action="{{route('user.upgradeToPremium')}}" method="post" class="mt-auto">
                        @csrf
                        <input type="hidden" name="duration" value="3">
                        <button class="btn btn-primary w-100" type="submit">{{__('lang.subscribe')}}</button>
                    </form>
                </div>
            </div>

            <!-- Plus Plan -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card p-4 shadow position-relative plan-card">
                    <span class="badge bg-success position-absolute top-0 start-50 translate-middle mt-4">6 {{__('lang.planMonthly')}}</span>
                    <h3 class="fw-bold text-center mt-4">Plus</h3>
                    <p class="price fw-bold text-center mb-1" style="font-size: 2rem;">Rp 2.399.000<span style="font-size: 1rem;" class="text-muted">/6 months</span></p>
                    <p class="text-center text-muted">{{__('lang.saveMonth10')}}</p>
                    <p class="mb-2">
                        ✅ {{__('lang.extend')}}<br>
                        ✅ {{__('lang.prioSupport')}}<br>
                        ✅ {{__('lang.exclusiveFeature')}}<br>
                    </p>
                    <p>{{__('lang.plusPlan')}}</p>
                    <form action="{{route('user.upgradeToPremium')}}" method="post" class="mt-auto">
                        @csrf
                        <input type="hidden" name="duration" value="6">
                        <button class="btn btn-primary w-100" type="submit">{{__('lang.subscribe')}}</button>
                    </form>
                </div>
            </div>

            <!-- Premium Plan -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card p-4 shadow position-relative plan-card">
                    <span class="badge bg-warning text-dark position-absolute top-0 start-50 translate-middle mt-4">{{__('lang.bestValue')}}</span>
                    <h3 class="fw-bold text-center mt-4">Premium</h3>
                    <p class="price fw-bold text-center mb-1" style="font-size: 2rem;">Rp 3.799.000<span style="font-size: 1rem;" class="text-muted">/12 {{__('lang.planMonthly')}}</span></p>
                    <p class="text-center text-muted">{{__('lang.save20')}}</p>
                    <p class="mb-2">
                        ✅ {{__('lang.fullAcc')}}<br>
                        ✅ {{__('lang.VIP')}}<br>
                        ✅ {{__('lang.maxSaving')}}<br>
                    </p>
                    <p>{{__('lang.ultExp')}}</p>
                    <form action="{{route('user.upgradeToPremium')}}" method="post" class="mt-auto">
                        @csrf
                        <input type="hidden" name="duration" value="12">
                        <button class="btn btn-primary w-100" type="submit">{{__('lang.subscribe')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <hr class="mt-5">
    @include('components.footer')
@endsection
