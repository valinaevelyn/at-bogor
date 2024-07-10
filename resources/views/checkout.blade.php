@extends('layouts.main')
@section('title', 'checkout')

@section('container')
    <div class="d-flex justify-content-center">
        <div class="card">
            <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                Anda akan melakukan pembelian produk dengan harga
                <strong>{{$transaction->quantity }}</strong>
                <button type="button" class="btn btn-primary mt-3" id="pay-button">
                    Bayar Sekarang
                </button>
            </div>

            <div>
                <button onclick="checkStatus('YOUR_ORDER_ID')">Check Transaction Status</button>
                <pre id="status-result"></pre>
            </div>

        </div>
    </div>
@endsection


@section('script')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-KrytpI0OPRLGzIfw"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay('{{$transaction->snap_token}}', {
                // Optional
                onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
    <script>
        function checkStatus(order_id) {
            fetch(`/transactions/${order_id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('status-result').textContent = JSON.stringify(data, null, 2);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
    

@endsection

