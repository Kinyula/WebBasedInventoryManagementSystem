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
        }

        /* td:nth-child(odd) {
            background-color: lightgray
        } */

        .logo img {
            width: 80px;
            position: relative;
            bottom: 40px;
            left: 90%;
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

        .court-of-arms img {
            position: absolute;

            bottom: 86%;
            width: 80px;
            border-radius: 50%;


        }

        .header-text {
            position: relative;
            top: 10%;
            width: 80%;
            text-align: center;
            left: 10%;
        }

        .printedDate {
            position: relative;
            left: 15%;
            bottom: 40px;
            color: green;
        }

        .printedLabel {
            font-weight: bold;
            position: relative;

        }

        .printedMessage {
            position: relative;
            left: 70%;
            bottom: 0%;
        }

    </style>

    <div class="header-container">

        <div class="header">

            <h3 class="header-text">
                THE UNITED REPUBLIC OF TANZANIA
                MINISTRY OF EDUCATION, SCIENCE AND TECHNOLOGY <br>
                THE UNIVERSITY OF DODOMA

            </h3>

        </div>

        <div class="logo">
            <img src="vendors/images/udom.png" alt="" srcset="">
        </div>

        <div class="court-of-arms">
            <img src="vendors/images/court-of-arms.jpg" alt="" srcset="">
        </div>

    </div>

    <br>
    <hr>

    <div class="printedMessage">

        <span class="printedLabel">Printed date : </span>
        <h4 class="printedDate">{{ \Carbon\Carbon::now()->format('d- m- Y') }}</h4>

    </div>

    <br>
    <table>
        <thead>
            <tr>
                <th>Printed by</th>
                <th>Asset's supplier</th>
                <th>Asset's category</th>
                <th>Asset's name</th>
                <th>Asset's price</th>
                <th>Asset's status</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($assets as $asset)
                <tr>
                    <td style="text-decoration:normal">{{ $asset['asset']->user->email }}</td>
                    <td style="text-decoration:normal">{{ $asset['asset']->supplier->company_name }}</td>
                    <td style="text-decoration:normal">{{ $asset['asset']->category->category_type }}</td>
                    <td style="text-decoration:normal">{{ $asset['asset']->asset_type }}</td>
                    <td style="text-decoration:normal" class="font-weight-bold">Tsh : 
                        {{ \Illuminate\Support\Number::format($asset['asset']->asset_cost, precision:2) }}/=</td>
                        <td style="text-decoration:normal">{{ $asset['asset']->asset_status }}</td>

                </tr>
            @endforeach
        </tbody>


    </table>


</body>

</html>
