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
            @if($setting->firstQ == "active")
                {{$quarter = "1st"}}
            @elseif($setting->secondQ == "active")
                {{$quarter ="2nd"}}
            @elseif($setting->thirdQ == "active")
                {{$quarter ="3rd"}}
            @elseif($setting->fourthQ == "active")
                {{$quarter ="3rd"}}
            @endif

            <td><a href="{{route('admin.dashboard.index',['year'=>$setting->sy,'quarter'=>$quarter])}}">{{$setting->sy}}</a></td>

            <td>{{$setting->status}}</td>

            @endforeach
        </tbody>
    </table>
</div>
</div>



</body>








</html>