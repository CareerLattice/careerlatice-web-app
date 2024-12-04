@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="container-fluid">
        <div class="row" style="min-height: calc(100vh - 135px);">
            <div class="col-lg-7 col-12" style="background-color: #ffffff; padding-left: 20px">
                <h3 class="fw-bold mt-5 ms-5 text-center">Checkout & Payment</h3>
                
                <div class="d-flex flex-column flex-sm-row justify-content-between mt-4 ms-5">
                    <h5 class="fw-bold mb-2 mb-sm-0">Personal Information</h5>
                    <p class="text-muted me-3 mt-2 mt-sm-0">Please review your information carefully before proceeding!</p>
                </div>

                <div class="row mt-2 ms-5">
                    <div class="col-12 col-md-4">
                        <p class="fw-bold">Full Name</p>
                    </div>
                    <div class="col-12 col-md-8">
                        <p>{{$applier->user->name}}</p>
                    </div>
                
                    <div class="col-12 col-md-4">
                        <p class="fw-bold">Email Address</p>
                    </div>
                    <div class="col-12 col-md-8">
                        <p>{{$applier->user->email}}</p>
                    </div>
                
                    <div class="col-12 col-md-4">
                        <p class="fw-bold">Phone Number</p>
                    </div>
                    <div class="col-12 col-md-8">
                        <p>{{$applier->user->phone_number}}</p>
                    </div>
                
                    <div class="col-12 col-md-4">
                        <p class="fw-bold">Shipping Address</p>
                    </div>
                    <div class="col-12 col-md-8">
                        <p>{{$applier->address}}</p>
                    </div>
                </div>
                
                <hr>

                <div class="d-flex flex-row justify-content-between mt-4 ms-5">
                    <h5 class="fw-bold">Terms & Conditions</h5>
                    <p class="text-muted me-3 ms-3">Please read the full Terms and Conditions carefully before proceeding with payment.</p>
                </div>

                <div class="ms-5 me-3">
                    <p style="text-align: justify" class="mb-2">
                        By proceeding with the payment, you acknowledge and agree to the following terms and conditions:
                        <ul style="text-align: justify">
                            <li><strong>No Refund Policy:</strong> All transactions are final. Once payment is processed, no refunds, cancellations, or exchanges will be accepted. Please ensure your decision before making a payment.</li>
                            <li><strong>Payment Confirmation:</strong> You confirm that all payment information provided is accurate, and you authorize the payment to be processed accordingly.</li>
                            <li><strong>Service Availability:</strong> We reserve the right to modify or discontinue any services or products at any time without prior notice. We will inform users as soon as possible if there is an impact on their purchase.</li>
                        </ul>
                        <p><strong>Important Notice:</strong> By proceeding with the payment, you confirm that you have read, understood, and agreed to the terms and conditions, including the no-refund policy.</p>
                    </p>
                </div>

            </div>

            <div class="col-lg-5 shadow-sm col-12" style="background-color: #f8f9fa">
                <div class="d-flex flex-column justify-content-center align-items-center py-5">
                    <h3 class="fw-bold mb-2 text-center">Payment Summary</h3>
                    <p class="text-muted mb-4 text-center mt-0">You are about to purchase the following:</p>
                    
                    <div class="row w-100">
                        <div class="col-12 col-md-4">
                            <p class="fw-bold">Product</p>
                        </div>
                        <div class="col-12 col-md-8">
                            <p>{{$transaction->duration}} Months {{$transaction->name}}</p>
                        </div>

                        <div class="col-12 col-md-4">
                            <p class="fw-bold">Premium Start Date</p>
                        </div>
                        <div class="col-12 col-md-8">
                            <p class="mb-2">{{$transaction->start_date}}</p>
                        </div>

                        <div class="col-12 col-md-4">
                            <p class="fw-bold">Premium End Date</p>
                        </div>
                        <div class="col-12 col-md-8">
                            <p class="mb-2">{{$transaction->end_date}}</p>
                        </div>
                        
                        <hr>

                        <div class="col-12 col-md-4">
                            <p class="fw-bold">Payment Total</p>
                        </div>
                        <div class="col-12 col-md-8">
                            <h3 class="mb-2">Rp {{number_format($transaction->price, 0, ',', '.')}}</h3>
                        </div>
                    </div>
            
                    <button id="pay-button" class="btn btn-primary w-75 py-2 mt-4">Proceed to Payment</button>
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
                    console.log('success');
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
                        console.log('success_2');
                    } catch (error) {
                        console.log('Error Zz');
                        console.error('Error:', error);
                    }
                },
                // Optional
                onPending: async function(result){
                    console.log('Pending');
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: async function(result){
                    console.log('Error');
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        }

        document.getElementById('pay-button').addEventListener('click', pay);
    </script>
@endsection
