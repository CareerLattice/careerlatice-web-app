@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="d-flex flex-column align-items-center mt-5">
        <button id="pay-button">Pay Subscription</button>
        <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre>
    </div>

    @include('components.footer')
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
