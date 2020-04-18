@extends('layouts.teacherHome',['year'=>$year,'quarter'=>$quarter])
@section('section-status')

    active
@endsection

@section('section-list-status')
    active
@endsection

@section('title')
    Section List | Admin
@endsection

@section('css')

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection

@section('contents')

    <div class="table-design">
        <h3 style="text-align: center;padding-top: 10px">Section List</h3>
    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th><input id="select-all-enlistment" type="checkbox" onclick="checkAll(this)"></th>
            <th>Id</th>
            <th class="th-sm">Section
            </th>
            <th class="th-sm">Adviser
            </th>
            <th class="th-sm">Grade
            </th>
            <th class="th-sm">Strand
            </th>
            <th class="th-sm">Year
            </th>
            <th>Total Student</th>
            <th>Status</th>

        </tr>
        </thead>
        <tbody>
        @if($sections)
            @foreach($sections as $section)

                <tr>
                    <td><input type="checkbox" name="checkboxTeacher[]" value="{{$section->id}}"></td>
                    <td>{{$section->id}}</td>
                    <td style="font-weight: bold"><a href="{{route('admin.section.show',['section_id'=>$section->id,'grade_id'=>$section->level->id,'strand_id'=>$section->strand->id,'year'=>$year,'quarter'=>$quarter])}}">{{$section->name}}</a></td>
                    <td>{{$section->adviser->name}}</td>
                    <td>{{$section->level->name}}</td>
                    <td>{{$section->strand->name}}</td>
                    <td>{{$section->year}}</td>
                    <td width="1%">

                        {{$section->students->count()}}

                    </td>
                    <td>{{$section->status}}</td>
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
@endsection