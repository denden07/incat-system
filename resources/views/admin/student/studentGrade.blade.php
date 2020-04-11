


@extends('layouts.teacherHome')

@section('title')
    Student List | Admin
@endsection


@section('student-status')

    active
@endsection

@section('student-list-status')
    active
@endsection

@section('contents')

    <div class="student-show-section-title">
        <h3>{{$student->name}}</h3>
    </div>


    <div class="select-semester">
        <span>Print Grade:</span>
        <select onchange="location = this.value;" name="" id="">
            <option value="">All</option>
            {{--<option value="{{route('teacher.mysection.show.students.filter',['year'=>$year,'sem'=>'1st','studentLrn'=>$student->lrnNo])}}">First</option>--}}
            {{--<option value="{{route('teacher.mysection.show.students.filter',['year'=>$year,'sem'=>'2nd','studentLrn'=>$student->lrnNo])}}">Second</option>--}}
        </select>
    </div>



    <div class="admin-show-student-grade-year"><p>Grade 11</p></div>


    <div class="student-grade-container">

        <p class="admin-student-grade-semester">1st Semester</p>
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
                    <td>{{$grade->schedule->subject->title}}</td>
                    <td>{{$grade->first}}</td>
                    <td>{{$grade->second}}</td>
                    <td>{{$grade->third}}</td>
                    <td>{{$grade->fourth}}</td>
                    <td>{{$grade->final}}</td>
                </tr>
            @endforeach
            </tbody>


        </table>




        <p style="margin-top: 10px" class="admin-student-grade-semester">2nd Semester</p>
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
                    <td>{{$grade->schedule->subject->title}}</td>
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



    <div style="margin-top: 10px" class="admin-show-student-grade-year"><p>Grade 12</p></div>

    <div class="student-grade-container">
        <p class="admin-student-grade-semester">1st Semester</p>
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
            @foreach($grades3 as $grade)
                <tr>
                    <td>{{$grade->schedule->subject->title}}</td>
                    <td>{{$grade->first}}</td>
                    <td>{{$grade->second}}</td>
                    <td>{{$grade->third}}</td>
                    <td>{{$grade->fourth}}</td>
                    <td>{{$grade->final}}</td>
                </tr>
            @endforeach
            </tbody>


        </table>







        <p class="admin-student-grade-semester">2nd Semester</p>
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
            @foreach($grades4 as $grade)
                <tr>
                    <td>{{$grade->schedule->subject->title}}</td>
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