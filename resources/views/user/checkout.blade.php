@extends('layouts.app')

@section('content')
    @include('components.navbar')

    <div class="d-flex flex-column align-items-center mt-5">
        <button id="pay-button" onclick="pay()">Pay Subscription</button>
        <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre>
    </div>

    @include('components.footer')
@endsection

@section('custom_script')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{env('MIDTRANS_CLIENT_KEY')}}"></script>
    <script type="text/javascript">
        function pay(){
            console.log('Test');
            snap.pay('{{$transaction->snap_token}}', {
                // Optional
                onSuccess: function(result){
                    console.log('success');
                /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onPending: function(result){
                    console.log('Pending');
                /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result){
                    console.log('Error');
                /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        }
    </script>
@endsection
