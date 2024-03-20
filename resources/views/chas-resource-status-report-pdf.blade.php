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
                <th class="table-plus datatable-nosort font-weight-bold">College inventory manager</th>


                <th class="font-weight-bold">University store resource id</th>

                <th class="font-weight-bold">College store resource id</th>

                <th class="font-weight-bold">Resource image</th>

                <th class="font-weight-bold">College name</th>

                <th class="font-weight-bold">Submission time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Reports as $report)
                <tr>

                    <td>
                        <h5 class="font-16">{{ $report['item']->user->email }}</h5>

                    </td>

                    <td style="text-decoration:normal">
                        {{ $report['item']->chasResources->asset_id }}
                    </td>

                    <td style="text-decoration:normal">

                        {{ $report['item']->chasResources->id }}
                    </td>

                    <td style="width: 100px;">
                       {{$report['item']->description}}
                    </td>

                    <td>
                        {{ $report['item']->college_name }}
                    </td>
                    <td>
                        <span>{{ $report['item']->updated_at->format('d M Y h:i:s') }}</span>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
