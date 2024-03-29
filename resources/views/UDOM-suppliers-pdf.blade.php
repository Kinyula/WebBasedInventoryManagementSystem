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
            bottom: 40px;
            left: 90%;
        }

        .court-of-arms img {
            position: absolute;

            bottom: 86%;
            width: 80px;
            border-radius: 50%;

        }

        .header {
            position: relative;
            bottom: 50px;
            text-align: center;
        }

        .header-text {
            position: relative;
            top: 10%;
            width: 80%;
            text-align: center;
            left: 10%;
        }

        .printedMessage {

            position: relative;
            left: 80%;
        }

        .printedLabel {
            font-weight: bold;
            position: relative;
            right: 15%;
            top: 7%;
        }

        .printedDate {
            position: relative;
            top: 2px;

            color: green;
        }

    </style>


    <div class="header-container">

        <div class="header">

            <h3 class="header-text">
                THE UNITED REPUBLIC OF TANZANIA
                MINISTRY OF EDUCATION, SCIENCE AND TECHNOLOGY <br>
                THE UNIVERSITY OF DODOMA

            </h3>

            {{-- @if (auth()->user()->college_name === 'Not set' && auth()->user()->role_id === '0')
                <h5>List of suppliers available</h5>
            @else
                <h4>{{ auth()->user()->college_name }}</h4>
            @endif --}}

        </div>

        <div class="logo">
            <img src="vendors/images/udom.png" alt="" srcset="">
        </div>

        <div class="court-of-arms">
            <img src="vendors/images/court-of-arms.jpg" alt="" srcset="">
        </div>
        {{-- <div class="udom-info">
            <h5>P.O BOX 259,</h5>
            <h5>DODOMA,</h5>
            <h5>

                {{ \Carbon\Carbon::now()->format('d- m- Y') }}

            </h5>

        </div> --}}
    </div>
    <br>
    <hr>
    <br>
    <table>
        <thead>
            <tr>
                <th class="table-plus datatable-nosort font-weight-bold">Supplier's name</th>


                <th class="font-weight-bold">Supplier's location </th>

                <th class="font-weight-bold">Supplier's contacts</th>


                <th class="font-weight-bold">Supplier's services</th>

                <th class="font-weight-bold">Created time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Suppliers as $supplier)
                <tr>

                    <td>
                        <h5 class="font-16">{{ $supplier['item']->company_name }}</h5>

                    </td>

                    <td style="text-decoration:normal">
                        {{ $supplier['item']->company_location }}
                    </td>


                    <td style="text-decoration:normal">
                        @foreach ($supplier['item']->phone as $supplierPhone)
                            {{ $supplierPhone->phone_number }}
                        @endforeach
                    </td>



                    <td style="text-decoration:normal">
                        @foreach ($supplier['item']->services as $supplierServices)
                            {{ $supplierServices->services_offered }}
                        @endforeach
                    </td>



                    <td>
                        <span>{{ $supplier['item']->updated_at->format('d M Y h:i:s') }}</span>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="printedMessage">
        <span class="printedLabel">Printed date : </span>
        <h4 class="printedDate">{{ \Carbon\Carbon::now()->format('d- m- Y') }}</h4>
    </div>
</body>

</html>
