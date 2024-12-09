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
        }
    </style>
@endsection

@section('content')
    @include('components.navbar')

    <div class="position-relative">
        <img src="{{asset('assets/premiumBanner.jpg')}}" alt="Company Cover" class="img-fluid w-100" style="object-fit: cover; height: 35vh; max-height: 400px">
        <div class="bannerText position-absolute top-50 start-50 translate-middle text-center text-white px-4">
            <h1 class="fw-medium">Explore Exciting <span style="color: gold">Premium Bundle</span> and <span style="color: gold">Benefits</span></h1>
            <h1 class="fw-medium">With CareerLattice</h1>
        </div>
    </div>

    <div class="container mt-5 mb-3">
        <h1 class="fw-bold text-center mb-2">Choose Your <span style="color: gold;">Perfect Plan</span> ✨</h1>
        <p class="text-center text-muted mb-5 mt-1">Unlock premium benefits that match your journey with CareerLattice.</p>

        <div class="row justify-content-center">
            <!-- Essential Plan -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card p-4 shadow position-relative plan-card">
                    <span class="badge bg-primary position-absolute top-0 start-50 translate-middle mt-4">3 Months Plan</span>
                    <h3 class="fw-bold text-center mt-4">Essential</h3>
                    <p class="price fw-bold text-center mb-1" style="font-size: 2rem;">Rp 1.499.000<span style="font-size: 1rem;" class="text-muted">/3 months</span></p>
                    <p class="text-center text-muted">Save 5% vs monthly</p>
                    <p class="mb-2">
                        ✅ Perfect for those starting out<br>
                        ✅ Access to all basic features<br>
                        ✅ No long-term commitment required<br>
                    </p>
                    <p>Get started with all the essentials to take your experience to the next level. Sign up today and make the most of your journey!</p>
                    <form action="{{route('user.upgradeToPremium')}}" method="post">
                        @csrf
                        <input type="hidden" name="duration" value="3">
                        <button class="btn btn-primary w-100" type="submit">Subscribe Now</button>
                    </form>
                </div>
            </div>

            <!-- Plus Plan -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card p-4 shadow position-relative plan-card">
                    <span class="badge bg-success position-absolute top-0 start-50 translate-middle mt-4">6 Months Plan</span>
                    <h3 class="fw-bold text-center mt-4">Plus</h3>
                    <p class="price fw-bold text-center mb-1" style="font-size: 2rem;">Rp 2.399.000<span style="font-size: 1rem;" class="text-muted">/6 months</span></p>
                    <p class="text-center text-muted">Save 10% vs monthly</p>
                    <p class="mb-2">
                        ✅ Extended access for 6 months<br>
                        ✅ Includes priority support<br>
                        ✅ Exclusive access to premium features<br>
                    </p>
                    <p>Upgrade to the Plus Plan for a more enhanced and seamless experience. Make the smart choice and save more with this plan!</p>
                    <form action="{{route('user.upgradeToPremium')}}" method="post">
                        @csrf
                        <input type="hidden" name="duration" value="6">
                        <button class="btn btn-primary w-100" type="submit">Subscribe Now</button>
                    </form>
                </div>
            </div>

            <!-- Premium Plan -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card p-4 shadow position-relative plan-card">
                    <span class="badge bg-warning text-dark position-absolute top-0 start-50 translate-middle mt-4">BEST VALUE</span>
                    <h3 class="fw-bold text-center mt-4">Premium</h3>
                    <p class="price fw-bold text-center mb-1" style="font-size: 2rem;">Rp 3.799.000<span style="font-size: 1rem;" class="text-muted">/12 months</span></p>
                    <p class="text-center text-muted">Save 20% vs monthly</p>
                    <p class="mb-2">
                        ✅ Full access for an entire year<br>
                        ✅ VIP customer support<br>
                        ✅ Maximum savings and exclusive rewards<br>
                    </p>
                    <p>Choose the Premium Plan for the ultimate experience and maximum savings. This is the best value for those who want it all!</p>
                    <form action="{{route('user.upgradeToPremium')}}" method="post">
                        @csrf
                        <input type="hidden" name="duration" value="12">
                        <button class="btn btn-primary w-100" type="submit">Subscribe Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <hr class="mt-5">
    @include('components.footer')

@endsection
