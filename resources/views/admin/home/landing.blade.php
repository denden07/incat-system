<!doctype html>
<html>
<head>
<title>
    Select Date
</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
    body{
        background:#2e8b57;
    }

        .year-card-body
        {

            margin-top: 10%;
            margin-left: auto;
            margin-right: auto;
            background: #1b1e24;
            width: 400px;
            height: 400px;
        }

    .year-card-body
    {
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;

        border: solid 1px #6c757d;
        transition: all ease .5s;
    }

    .year-card-body:hover
    {
        transform: scale(1.2);
    }

        .year-card-title
        {
            color: #f8fafc;
            border-bottom: 4px solid #5a6268;
            text-align: center;
            font-size: 16px;
            font-weight: 100;
            padding: 5px;
        }

    .year-card-body table{
        color: #f8fafc;
        margin-left: auto;
        margin-right: auto;
        margin-top: 5px;
        width: 100%;
        text-align: center;
    }

    .year-card-body table th
    {

        font-size: 18px;
        border: solid 1px #5a6268;
    }

    .year-card-body table td
    {

        font-size: 18px;
    }

    .year-card-body table tr:hover td
    {
        background: black;
    }



    </style>
</head>





<body>

<div class="option-card-body">

<div class="year-card-body">
    <div class="year-card-title">
        Select School Year
    </div>

    <table>
        <th>School Year</th>
        <th>Status</th>

        <tbody>
        @foreach($settings as $setting)
        <tr>
            <td>{{$setting->sy}}</td>
            <td>{{$setting->status}}</td>
        </tr>
        <tr>
            <td>{{$setting->sy}}</td>
            <td>{{$setting->status}}</td>
        </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>



</body>








</html>