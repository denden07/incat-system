<!doctype html>


<html>
<head>
    <title>Form</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>

<body>

<div class="grade-slip-body">
    <img class="grade-slip-logo" src="{{asset('images/logo/incat.png')}}" alt="">
    <p style="text-align: center;margin-bottom: -5px">Ilocos Norte College of Arts and Trades </p>
    <p style="text-align: center">P. Gomez, Laoag City, Ilocos Norte</p>

    <h3 class="grade-slip-banner" >GRADE SLIP</h3>


    <div class="grade-slip-info row justify-content-center">
        <div style="margin-right: -15px" class="col-4">
            <p align="left" style="margin-bottom: -2px"><span style="font-weight: bold">Name:</span> {{$student->name}}</p>
            <p align="left"><span style="font-weight: bold">Lrn:</span> {{$student->lrnNo}}</p>
        </div>
        <div class="col-4">
          <p  align="left" style="margin-bottom: -2px"><span style="font-weight: bold">Strand:</span> {{$student->strands->name}}</p>
           <p   align="left"><span style="font-weight: bold">Term:</span>  {{$gradeYear->year}} {{$sem}} Sem</p>
        </div>
    </div>


    <div class="grade-slip-table">

        <table>
            <thead>
            <th>Subject Code</th>
            <th>Subject</th>
            <th>Official Grade</th>
            <th>Remarks</th>
            </thead>


            <tbody>
            @foreach($grades as $grade)
            <tr>
            <td>{{$grade->subject->subjCode}}</td>
                <td>{{$grade->subject->title}}</td>
                <td>{{$grade->final}}</td>
                @if($grade->final >= 75)
                <td>Pass</td>
                 @else
                <td>Fail</td>
                    @endif
            </tr>
            @endforeach

            </tbody>














        </table>


    </div>


    <p style="padding: 20px" align="center">{{\Carbon\Carbon::now()->toDayDateTimeString()}}</p>


    
</div>


<script>
    window.print();
</script>

</body>
