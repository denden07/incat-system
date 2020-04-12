


@extends('layouts.teacherLayout')

@section('title')
 Show Student

@endsection

@section('mySection-status')
    active
@endsection

@section('mySection-status-all')
    active
@endsection

@section('contents')

    <div class="student-show-section-title">
        <h3>{{$student->name}}</h3>
    </div>


    <div class="select-semester">
        <span>Filter Semester: </span>
        <select onchange="location = this.value;" name="" id="">
            <option value="">All</option>
            <option value="{{route('teacher.mysection.show.students.filter',['year'=>$year,'sem'=>'1st','studentLrn'=>$student->lrnNo])}}">First</option>
            <option value="{{route('teacher.mysection.show.students.filter',['year'=>$year,'sem'=>'2nd','studentLrn'=>$student->lrnNo])}}">Second</option>
        </select>
    </div>


    <div class="student-grade-container">

        <p class="student-grade-semester">1st Semester</p>
    <table class="student-grade-table">
        <thead>
        <tr>
            <th>Subject</th>
            <th>First</th>
            <th>Second</th>
            <th>Third</th>
            <th>Fourth</th>
            <th>Final</th>
        </tr>

        </thead>
        <tbody>
        @foreach($grades1 as $grade)
            <tr>
        <td>{{$grade->subject->title}}</td>
            <td>{{$grade->first}}</td>
            <td>{{$grade->second}}</td>
            <td>{{$grade->third}}</td>
            <td>{{$grade->fourth}}</td>
            <td>{{$grade->final}}</td>
            </tr>
        @endforeach
        </tbody>


    </table>
    </div>


    <div class="student-grade-container">
        <p class="student-grade-semester">2nd Semester</p>
    <table class="student-grade-table">
        <thead>
        <tr>
            <th>Subject</th>
            <th>First</th>
            <th>Second</th>
            <th>Third</th>
            <th>Fourth</th>
            <th>Final</th>
        </tr>

        </thead>
        <tbody>
        @foreach($grades2 as $grade)
            <tr>
                <td>{{$grade->subject->title}}</td>
                <td>{{$grade->first}}</td>
                <td>{{$grade->second}}</td>
                <td>{{$grade->third}}</td>
                <td>{{$grade->fourth}}</td>
                <td>{{$grade->final}}</td>
            </tr>
        @endforeach
        </tbody>


    </table>
    </div>

@endsection


@section('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable(

                {
                    dom: 'Blfrtip',

                    lengthChange: true,
                    "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],

                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print',
                    ],



                }
            );

        } );

    </script>

    <script>
        $(document).ready(function () {
            $('#select-all-mySubject').click(function (event) {
                if(this.checked){
                    $(':checkbox').each(function () {
                        this.checked = true;
                    })
                }else{
                    $(':checkbox').each(function() {
                        this.checked = false;
                    });
                }
            })
        });
    </script>
@endsection