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
                <th>College inventory manager</th>
                <th>Asset name</th>
                <th>College name</th>
                <th>Allocation status</th>
                <th>Asset status</th>
                <th>Allocation time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Resources as $resource)
                <tr>
                    <td>{{ $resource['resource']->user->email }}</td>
                    <td>{{ $resource['resource']->resource_name }}</td>
                    <td>{{ $resource['resource']->college_name }}</td>
                    <td>{{ $resource['resource']->status }}</td>
                    <td>{{ $resource['resource']->asset_status }}</td>
                    <td>{{ $resource['resource']->updated_at->format('d, M Y- h:i:s a') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
