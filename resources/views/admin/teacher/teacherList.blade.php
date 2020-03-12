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

    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
    <th><input id="select-all-enlistment" type="checkbox" onclick="checkAll(this)"></th>
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

</tr>
</thead>
        <tbody>
@if($teachers)
    @foreach($teachers as $teacher)

        <tr>
            <td><input type="checkbox" name="checkboxTeacher[]" value="{{$teacher->id}}"></td>
            <td>{{$teacher->id}}</td>
            <td>{{$teacher->name}}</td>
            <td>{{$teacher->course}}</td>
            <td>{{$teacher->expertise}}</td>
            <td>{{$teacher->contactNo}}</td>
            <td>{{$teacher->address}}</td>
        </tr>

        @endforeach
    @endif
        </tbody>
    </table>

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
        $(document).ready(function () {
            var table = $('#datatable').DataTable({
                'processing':true,
                'serverSide': true,
                'ajax': "{{route('public-pre-enlistment.index')}}",
                'columns':[
                    {'data': 'levels'}
                ],
            });


            $('.filter-select').change(function () {
                table.column($(this).data('column'))
                    .search($(this).val())
                    .draw();
            });

        });
    </script>
@endsection