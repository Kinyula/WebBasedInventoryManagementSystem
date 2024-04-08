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
            width: 100%;
            border: none;
        }

        /* td:nth-child(odd) {
            background-color: lightgray
        } */

        tr td {
            text-align: center;
        }

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

        .description-container {

display: block;
margin-top: 30px

}

.resource-name-label {
font-weight: bold;
}

.resource-name {

position: relative;
top: 10px;
}

.description-label {

font-weight: bold;
}

.description-message {

position: relative;
top: 10px;

}

.resource-name-container {

display: block;

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

                <th>QR Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Resources as $resource)
                <tr >
                    <td><img src="{{ $resource['qrcode'] }}" alt="QR code"></td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
