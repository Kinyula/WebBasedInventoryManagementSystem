@extends('layouts.app')

@section('content')

@if (auth()->user()->role_id === '2' || auth()->user()->role_id === '1' || auth()->user()->role_id === '0')

@livewire('qr-code-reader-livewire')

@else

<p style="display: flex;justify-content:center;align-items:center;margin-top:20%">ERROR | NOT AUTHORIZED TO VIEW THIS PAGE</p>

@endif


@endsection





{{-- <body>

    <h1>HTML5 QrCode Scanner</h1>


    <div id="reader" style="width: 500px;">

    </div>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <script>
        // CHECK IF THE DOM IS READY

        function onScanSuccess(decodedText, decodedResult) {

            // handle the scanned code as you like, for example:
            alert(`Code matched = ${decodedText}`, decodedResult);
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>

</body> --}}
