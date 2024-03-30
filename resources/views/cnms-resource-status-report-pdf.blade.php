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
            position: absolute;
            bottom: 84%;
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

        .collegeMessage {

            position: relative;
            bottom: 8%;

        }

        .printedMessage {
            position: relative;
            left: 70%;
            bottom: 16%;
        }

        .printedLabel {
            font-weight: bold;
            position: relative;

        }

        .collegeLabel {
            font-weight: bold;
            position: relative;
            left: 2%;

        }

        .printedDate {
            position: relative;
            left: 15%;
            bottom: 40px;
            color: green;
        }

        .collegeName {

            position: relative;
            left: 17%;
            bottom: 40px;
            color: green;
        }

        .description-container {

            display: block;
            position: relative;
            top: 1%;
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

            position: relative;
            bottom: 3%;
        }

        .header-container {
            position: relative;
            bottom: 5%;
        }

        .horizontalLine {
            position: relative;
            bottom: 8%;
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

    <hr class="horizontalLine">

    <div class="collegeMessage">
        <span class="collegeLabel">College name : </span>

        <h4 class="collegeName">{{ auth()->user()->college_name }}</h4>
    </div>

    <div class="printedMessage">
        <span class="printedLabel">Printed date : </span>

        <h4 class="printedDate">{{ \Carbon\Carbon::now()->format('d- m- Y') }}</h4>
    </div>
    <br>
    <table>
        <thead>
            <tr>
                <th class="table-plus datatable-nosort font-weight-bold">College inventory manager</th>

                <th class="font-weight-bold">University store resource id</th>

                <th class="font-weight-bold">College store resource id</th>

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
                        {{ $report['item']->cnmsResources->asset_id }}
                    </td>

                    <td style="text-decoration:normal">

                        {{ $report['item']->cnmsResources->id }}
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

    @if (count($Reports) == 1)
        @foreach ($Reports as $report)
            <div class="resource-name-container">

                <span class="resource-name-label">
                    Reported resource name with a University of Dodoma store asset id of
                    {{ $report['item']->cnmsResources->asset_id }}
                </span>

                <br>

                <span class="resource-name">

                    {{ $report['item']->cnmsResources->resource_name }}

                </span>
            </div>
            <div class="description-container">

                <span class="description-label">
                    Description on the reported resource called {{ $report['item']->cnmsResources->resource_name }} with
                    a
                    University of Dodoma store asset id of {{ $report['item']->cnmsResources->asset_id }}
                </span>

                <br>

                <span class="description-message">

                    {{ $report['item']->description }}

                </span>
            </div>
        @endforeach
    @endif



    @if (count($Reports) > 1)

        <style>
            .table,
            .th,
            .td {
                border-bottom: 1px solid black;
                border-collapse: collapse;
                padding: 10px;
                position: absolute;
                bottom: 40%;
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

            .collegeMessage {

                position: relative;
                bottom: 8%;

            }

            .printedMessage {
                position: relative;
                left: 70%;
                bottom: 16%;
            }

            .printedLabel {
                font-weight: bold;
                position: relative;

            }

            .collegeLabel {
                font-weight: bold;
                position: relative;
                left: 2%;

            }

            .printedDate {
                position: relative;
                left: 15%;
                bottom: 40px;
                color: green;
            }

            .collegeName {

                position: relative;
                left: 17%;
                bottom: 40px;
                color: green;
            }

            .description-container {

                display: block;
                position: relative;
                top: 55%;
            }

            .resource-name-label {
                font-weight: bold;
                position: relative;
                top: 6%;
            }

            .resource-name {

                position: relative;
                top: 7%;
            }

            .description-label {

                font-weight: bold;
                position: relative;
                top: 25%;

            }

            .description-message {

                position: relative;
                top: 26%;

            }

            .resource-name-container {

                display: block;

                position: relative;
                top: 20%;
            }

            .header-container {
                position: relative;
                bottom: 5%;
            }

            .horizontalLine {
                position: relative;
                bottom: 8%;
            }

            .more-information {
                position: relative;
                top: 13%;
                text-align: center
            }
        </style>

        <h2 class="more-information">More information about the resources</h2>
        <table class="table">
            <thead class="thead">
                <tr class="tr">
                    <th class=" th table-plus datatable-nosort font-weight-bold">Resource name</th>

                    <th class=" th font-weight-bold">Resource description</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($Reports as $report)
                    <tr>
                        <td class="td">
                            <h5 class="font-16">{{ $report['item']->cobeResources->resource_name }}</h5>

                        </td>

                        <td class="td" style="text-decoration:normal">
                            {{ $report['item']->description }}
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>


    @endif


</body>

</html>
