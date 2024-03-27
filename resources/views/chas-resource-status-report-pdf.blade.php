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
            bottom: 75%;
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

        }

        .printedMessage {
            position: relative;
            left: 70%;
            bottom: 8%;
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

                <th class="font-weight-bold">Resource description</th>

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



    <br>
    <br>
    <br>

    <div class="resource-name-container">

        <span class="resource-name-label">
            Reported resource name
        </span>

        <br>

        <span class="resource-name">

            {{ $report['item']->chasResources->resource_name }}

        </span>
    </div>
    <div class="description-container">

        <span class="description-label">
            Description on the reported resource
        </span>

        <br>

        <span class="description-message">

            {{ $report['item']->description }}

        </span>
    </div>




</body>

</html>
