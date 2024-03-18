<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body>
    <style>
        table,
        th,
        td {
            border-bottom: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }

        /* td:nth-child(odd) {
            background-color: lightgray
        } */

        .logo img {
            width: 80px;
            position: relative;
            bottom: 20px;
        }

        .udom-info {
            position: absolute;
            left: 80%;
            bottom: 85%;
        }

        .header {
            position: relative;
            bottom: 50px;
            text-align: center;
        }
    </style>
    <div class="header">
        <h3>THE UNIVERSITY OF DODOMA</h3>
    </div>

    <div class="header-container">

        <div class="logo">
            <img src="vendors/images/udom.png" alt="" srcset="">
        </div>

        <div class="udom-info">
            <h5>P.O BOX 259,</h5>
            <h5>DODOMA,</h5>
            <h5>

                {{ \Carbon\Carbon::now()->format('d- m- Y') }}

            </h5>

        </div>
    </div>
    <br>
    <hr>
    <br>
    <table>
        <thead>
            <tr>

                <th>Category</th>
                <th>Asset Type</th>
                <th>QR Code</th>
                <th>Asset Status</th>
                <th>Received time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Assets as $asset)
                <tr>
                    <td>{{ $asset['item']->category->category_type }}</td>
                    <td>{{ $asset['item']->asset_type }}</td>
                    <td><img src="{{ $asset['qrcode'] }}" alt="QR code"></td>
                    <td>{{ $asset['item']->assetStatus?->status }}</td>
                    <td>{{ $asset['item']->updated_at->format('d, M Y- h:i:s a') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
