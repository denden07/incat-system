

@extends('layouts.teacherLayout')

@section('title')
    My Section Students | All

@endsection

@section('mySection-status')
    active
@endsection

@section('mySection-status-all')
    active
@endsection

@section('contents')


    <div class="mySubject-list-table-design table-design ">
        <h3>{{$section->name}}</h3>
        <div class="mySubject-list-table-design-info">
            <p><span>Year:</span> {{$section->year}}</p>
            <p><span>Schedules:</span> {{$section->status}}</p>
        </div>




                @csrf
                @include('layouts._message')
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">


                    <thead>
                    <tr>
                        <th><input id="select-all-mySubject" type="checkbox" onclick="checkAll(this)"></th>
                        <th>Id</th>
                        <th class="th-lg">Name
                        </th>
                        <th class="th-sm">Address
                        </th>
                        <th class="th-sm">Contact
                        </th>
                        <th class="th-sm">Sex
                        </th>
                        <th class="th-sm">Status
                        </th>



                    </tr>
                    </thead>
                    <tbody>



                    @foreach($section->students as $student)
                        <tr>
                            <td><input type="checkbox" name="checkboxMySubject[]" value="{{$student->id}}"></td>
                            <td><input name="student_id[]" value="{{$student->id}}" style="display: none">{{$student->lrnNo}}</td>
                            <td><a href="{{route('teacher.mysection.show.students',['year'=>$year,'studentLrn'=>$student->lrnNo])}}">{{$student->name}}</a></td>
                            <td>{{$student->address}}</td>
                            <td>{{$student->parentCpNo}}</td>
                            <td>{{$student->sex}}</td>
                            <td>{{$student->status}}</td>

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