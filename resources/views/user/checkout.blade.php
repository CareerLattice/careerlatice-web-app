@extends('layouts.app')

@section('title', 'Checkout and Payment')

@section('content')
    @include('components.navbar')

    <div class="container-fluid">
        <div class="row" style="min-height: calc(100vh - 135px);">
            <div class="col-lg-7 col-12" style="background-color: #ffffff; padding-left: 20px">
                <h3 class="fw-bold mt-5 ms-5 text-center">{{__('lang.checkoutPayment')}}</h3>

                <div class="d-flex flex-column flex-sm-row justify-content-between mt-4 ms-5">
                    <h5 class="fw-bold mb-2 mb-sm-0">{{__('lang.personalInfo')}}</h5>
                    <p class="text-muted me-3 mt-2 mt-sm-0">{{__('lang.reviewInfo')}}</p>
                </div>

                <div class="row mt-2 ms-5">
                    <div class="col-12 col-md-4">
                        <p class="fw-bold">{{__('lang.fullName')}}</p>
                    </div>
                    <div class="col-12 col-md-8">
                        <p>{{$applier->user->name}}</p>
                    </div>

                    <div class="col-12 col-md-4">
                        <p class="fw-bold">{{__('lang.emailAddress')}}</p>
                    </div>
                    <div class="col-12 col-md-8">
                        <p>{{$applier->user->email}}</p>
                    </div>

                    <div class="col-12 col-md-4">
                        <p class="fw-bold">{{__('lang.phoneNumber')}}</p>
                    </div>
                    <div class="col-12 col-md-8">
                        <p>{{$applier->user->phone_number}}</p>
                    </div>

                    <div class="col-12 col-md-4">
                        <p class="fw-bold">{{__('lang.shippingAddress')}}</p>
                    </div>
                    <div class="col-12 col-md-8">
                        <p>{{$applier->address}}</p>
                    </div>
                </div>

                <hr>

                <div class="d-flex flex-row justify-content-between mt-4 ms-5">
                    <h5 class="fw-bold">{{__('lang.termsCondition')}}</h5>
                    <p class="text-muted me-3 ms-3">{{__('lang.fullterms')}}</p>
                </div>

                <div class="ms-5 me-3">
                    <p style="text-align: justify" class="mb-2">
                        {{__('lang.proceedPayment')}}
                        <ul style="text-align: justify">
                            <li><strong>{{__('lang.noRefund')}}</strong>{{__('lang.finalTransaction')}}</li>
                            <li><strong>{{__('lang.paymentConfirm')}}</strong>{{__('lang.youConfirm')}}</li>
                            <li><strong>{{__('lang.serviceAvailability')}}</strong>{{__('lang.discontinueService')}}</li>
                        </ul>
                        <p><strong>{{__('lang.impNotice')}}</strong> {{__('lang.proceed')}}</p>
                    </p>
                </div>
            </div>

            <div class="col-lg-5 shadow-sm col-12" style="background-color: #f8f9fa">
                <div class="d-flex flex-column justify-content-center align-items-center py-5">
                    <h3 class="fw-bold mb-2 text-center">{{__('lang.paymentSummary')}}</h3>
                    <p class="text-muted mb-4 text-center mt-0">{{__('lang.purchaseFollowing')}}</p>

                    <div class="row w-100">
                        <div class="col-12 col-md-4">
                            <p class="fw-bold">{{__('lang.product')}}</p>
                        </div>
                        <div class="col-12 col-md-8">
                            <p>{{$transaction->duration}} {{__('lang.months')}} {{$transaction->name}}</p>
                        </div>

                        <div class="col-12 col-md-4">
                            <p class="fw-bold">{{__('lang.premiumStartDate')}}</p>
                        </div>
                        <div class="col-12 col-md-8">
                            <p class="mb-2">{{$transaction->start_date}}</p>
                        </div>

                        <div class="col-12 col-md-4">
                            <p class="fw-bold">{{__('lang.premiumEndDate')}}</p>
                        </div>
                        <div class="col-12 col-md-8">
                            <p class="mb-2">{{$transaction->end_date}}</p>
                        </div>

                        <hr>

                        <div class="col-12 col-md-4">
                            <p class="fw-bold">{{__('lang.totalPay')}}</p>
                        </div>
                        <div class="col-12 col-md-8">
                            <h3 class="mb-2">Rp {{number_format($transaction->price, 0, ',', '.')}}</h3>
                        </div>
                    </div>

                    <button id="pay-button" class="btn btn-primary w-75 py-2 mt-4">{{__('lang.proceedPay')}}</button>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('custom_script')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{env('MIDTRANS_CLIENT_KEY')}}"></script>
    <script type="text/javascript">
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        function pay(){
            snap.pay('{{$transaction->snap_token}}', {
                onSuccess: async function(result){
                    try {
                        const response = await fetch('{{route("user.premiumSuccess")}}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                            },
                            body: JSON.stringify({
                                duration: {{$transaction->duration}},
                                snap_token: '{{$transaction->snap_token}}',
                            }),
                        });
                        window.location.href = '{{route("user.home")}}';
                    } catch (error) {
                        console.error('Error:', error);
                    }
                },
                onPending: async function(result){
                    console.log('Pending');
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                onError: async function(result){
                    console.log('Error');
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        }

        document.getElementById('pay-button').addEventListener('click', pay);
    </script>
@endsection
