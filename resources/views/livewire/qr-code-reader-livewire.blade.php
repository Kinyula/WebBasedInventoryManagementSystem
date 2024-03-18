<div>

    <div class="card-box mb-30 p-3">

        <h1 class="h5 pd-20">UDOM Qr code Scanner</h1>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset="" style="float: inline-end">
    </div>

    <div class="card-box mb-30 p-3 float-end" style="display: flex;justify-content:space-around ">


        <div id="reader" style="width: 400px;" class="nowrap">

        </div>

        <div class="Information p-4 display:block">
            <h2 class="font-weight-bold p-3">College manager's information</h2>
            <span>Email :</span>
            <span class="font-weight-bold p-1">{{ auth()->user()->email }}</span>
            <br>
            <span>College :</span>
            <span class="font-weight-bold p-1">{{ auth()->user()->college_name }}</span>

            <br>
            <span>Item ID: <span id="code_info"></span></span>
            <span class="font-weight-bold p-1" id="container"></span>
            <button
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4">
                <a href="" class="text-decoration-none text-white " id="update">Set Status</a>
            </button>
        </div>

        <script src="{{asset('javascript/html5-qrcode.min.js')}}"></script>
        <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
        <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


        <script>
            function onScanSuccess(decodedText, decodedResult) {

                $("#code_info").text(decodedText);
                $("#update").attr("href", `qr-code-asset-update/${decodedText}`);
            }

            function onScanFailure(error) {
                // handle scan failure, usually better to ignore and keep scanning.

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


    </div>



</div>
