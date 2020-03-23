@extends('layouts.teacherHome')

@section('section-status')

    active
@endsection

@section('subject-list-status')
    active
@endsection

@section('title')
    Subject List | Admin'e
@endsection

@section('css')

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection

@section('contents')

    <div class="teacher-list-table-design table-design ">
        <h3>All Subject</h3>

            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th><input id="select-all-teacher" type="checkbox" onclick="checkAll(this)"></th>

                    <th style="width: 25%" class="th-sm">Subject Code
                    </th>
                    <th style="width: 40%" class="th-lg">Title
                    </th>
                    <th class="th-sm">Grade
                    </th>
                    <th class="th-sm">Strand
                    </th>


                </tr>
                </thead>
                <tbody>
                @if($subjects)
                    @foreach($subjects as $subject)

                        <tr>
                            <td><input type="checkbox" name="checkboxTeacher[]" value="{{$subject->id}}"></td>
                            <td>{{$subject->subjCode}}</td>
                            <td>{{$subject->title}}</td>
                            @if(!empty($subject->level->name))
                            <td>{{$subject->level->name}}</td>
                            @elseif(empty($subject->level->name))
                                <td>Universal</td>
                                @endif
                            @if(!empty($subject->strand->name))
                                <td>{{$subject->strand->name}}</td>
                            @elseif(empty($subject->strand->name))
                                <td>Universal</td>
                            @endif
                        </tr>

                    @endforeach
                @endif
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