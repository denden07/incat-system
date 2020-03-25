

@extends('layouts.teacherLayout')

@section('title')
    All Subjects | Teacher
@endsection

@section('mySubject-status')
    active
@endsection

@section('mySubject-list-status')
    active
@endsection

@section('contents')


    <div class="mySubject-list-table-design table-design ">
        <h3>{{$schedule->subject->title}}</h3>
        <div class="mySubject-list-table-design-info">
            <p>Section: {{$schedule->section->name}}</p>
            <p>Schedules: {{$schedule->schedule}}</p>
        </div>

        <form action="{{route('teacher.mysubject.student.show.update',['schedule_id'=>$schedule->id])}}" method="post">

            @csrf
            @include('layouts._message')
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <button type="button"   data-toggle="modal" class="btn-primary button-enroll-enlistment-list" data-target="#exampleModalCenter"><i class="fas fa-paper-plane"></i></i></button>




                <thead>
                <tr>
                    <th><input id="select-all-mySubject" type="checkbox" onclick="checkAll(this)"></th>
                    <th>Id</th>
                    <th class="th-sm">Name
                    </th>
                    <th class="th-sm">First
                    </th>
                    <th class="th-sm">Second
                    </th>
                    <th class="th-sm">Third
                    </th>
                    <th class="th-sm">Fourth
                    </th>
                    <th style="display: none">Hi</th>
                    <th>Final</th>


                </tr>
                </thead>
                <tbody>


                @foreach($grades as $grade)
                    <tr>
                        <td><input type="checkbox" name="checkboxMySubject[]" value="{{$grade->id}}"></td>
                        <td><input name="student_id[]" value="{{$grade->student_id}}" style="display: none">{{$grade->student_id}}</td>
                        <td>{{$grade->student->name}}</td>
                        <td><input name="first[]" type="number" value="{{$grade->first}}"></td>
                        <td><input name="second[]" type="number"  value="{{$grade->second}}"></td>
                        <td><input name="third[]" type="number"  value="{{$grade->third}}"></td>
                        <td><input name="fourth[]" type="number"  value="{{$grade->fourth}}"></td>
                        <td style="display: none">  <input style="display: none" type="text" name="subject_id[]" value="{{$schedule->id}}"></td>

                        <td>Tba</td>
                        @endforeach
                    </tr>


                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Submit Grades?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are You sure?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" >Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </tbody>
            </table>
        </form>
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