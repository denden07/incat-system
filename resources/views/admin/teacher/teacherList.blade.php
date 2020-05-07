@extends('layouts.teacherHome')

@section('teacher-status')

    active
@endsection

@section('teacher-list-status')
    active
@endsection

@section('title')
    Teacher List | Admin
@endsection

@section('css')

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection

@section('contents')

<div class="teacher-list-table-design table-design ">
    <h3>Teacher List</h3>
    <form action="{{route('admin.teacher.action')}}" method="post">
        @csrf
        @include('layouts._message')
    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <button  type="button" data-toggle="modal"  class="btn-danger button-delete-enlistment-list" data-target="#exampleModalCenter1"><i class="fas fa-times-circle"></i></button>
        <button type="button"   data-toggle="modal" class="btn-success button-enroll-enlistment-list" data-target="#exampleModalCenter"><i class="fas fa-check"></i></button>


        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Mark teacher as inactive?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are You sure?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="action" value="inactive">Yes</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Mark teacher as active?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are You sure?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="action" value="active">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <thead>
<tr>
    <th><input id="select-all-teacher" type="checkbox" onclick="checkAll(this)"></th>
    <th>Id</th>
    <th class="th-sm">Name
    </th>
    <th class="th-sm">Course
    </th>
    <th class="th-sm">Expertise
    </th>
    <th class="th-sm">Contact Number
    </th>
    <th class="th-sm">Address
    </th>

    <th>Status</th>
</tr>
</thead>
        <tbody>
@if($teachers)
    @foreach($teachers as $teacher)

        <tr>
            <td><input type="checkbox" name="checkboxTeacher[]" value="{{$teacher->id}}"></td>
            <td>{{$teacher->id}}</td>
            <td><a href="{{route('admin.teacher.edit',['teacher_id'=>$teacher->id,'year'=>$year,'quarter'=>$quarter])}}">{{$teacher->name}}</a></td>
            <td>{{$teacher->course}}</td>
            <td>{{$teacher->expertise}}</td>
            <td>{{$teacher->contactNo}}</td>
            <td>{{$teacher->address}}</td>

            @if($teacher->status == 'active')
                <td><div class="alert-success">active</div></td>
            @else
                <td><div class="alert-danger">inactive</div></td>
            @endif


        </tr>

        @endforeach
    @endif
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
            $('#select-all-teacher').click(function (event) {
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