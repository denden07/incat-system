@extends('layouts.teacherHome')


@section('title')
    Enlistment | Admin
    @endsection

@section('css')
    <!-- MDBootstrap Datatables  -->

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection
@section('student-status')

    active
@endsection

@section('student-status-enlistment')
    active
@endsection

@section('contents')

    <div class="container table-design">
        <h3 class="enlistment-list-banner">Enlistment List</h3>
        <div class="row table-inner-design">
            <form action="{{route('admin.student.enlistment.bulkdelete')}}" method="post">
                @csrf

            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <button type="submit" name="action" value="delete" class="btn-danger button-delete-enlistment-list"><i class="fas fa-trash"></i></button>
                <button type="submit" name="action" value="update" class="btn-success button-delete-enlistment-list"><i class="fas fa-upload"></i></button>
        <thead>
        <tr>
            <th><input id="select-all-enlistment" type="checkbox" onclick="checkAll(this)"></th>
            <th>Id</th>
            <th class="th-sm">Name
            </th>
            <th class="th-sm">Grade Level
            </th>
            <th class="th-sm">Age
            </th>
            <th class="th-sm">Strand
            </th>
            <th class="th-sm">Action
            </th>

        </tr>
        </thead>
        <tbody>

            @if($students)
                @foreach($students as $student)
                    <tr>
                        <td><input type="checkbox" name="checkboxEnlistment[]" value="{{$student->id}}"></td>
            <td>{{$student->id}}</td>
            <td>{{$student->firstName ." ".$student->middleName ." " .$student->lastName}}</td>
            <td>{{$student->level->name}}</td>
            <td>{{$student->age}}</td>
            <td>{{$student->strand}}</td>
            <td><a href="{{route('admin.student.enlistment.delete',['student_id'=>$student->id])}}">delete</a></td>

                    </tr>
                @endforeach
                @endif

        </tbody>
        <tfoot>
        <tr>
            <td></td>
            <td></td>
            <td></td>
         <td>
             <select data-column="3" class="form-control filter-select">
                 <option value="">Select Grade Level</option>
                 @foreach($levels as $level)
                     <option value="{{$level}}">{{$level}}</option>
                     @endforeach
             </select>
         </td>
            <td></td>

            <td>
                <select data-column="5" class="form-control filter-select">
                    <option value="">Select Strand</option>
                    <optgroup label="Academic">
                    <option value="(HUMSS) Humanities and Social Studies">(HUMSS) Humanities and Social Studies</option>
                    <option value="(STEM) Science, Techonological, Engineering and Mathematics">(STEM) Science, Techonological, Engineering and Mathematics</option>
                    <option value="(ABM) Accountancy,Business And Managemen">(ABM) Accountancy,Business And Managemen</option>
                    </optgroup>
                    <optgroup label="Technical/Vocational">
                    <optgroup label="(HE) Home Economics">
                        <option value="(BC) Beauty Care" >(BC) Beauty Care</option>
                        <option value="(GT) Garments Technology" >(GT) Garments Technology</option>
                        <option value="(FPS) Food Products Servicing" >(FPS) Food Products Servicing</option>
                        <option value="(HRS) Hotel & Restaurant Servicing" >(HRS) Hotel & Restaurant Servicing</option>
                    </optgroup>

                    <optgroup label="(ICT) Information And Communication Technology">
                        <option value="(CSS) Computer System Servicing" >(CSS) Computer System Servicing</option>
                        <option value="(TDA) Technical Drafting and Animation">(TDA) Technical Drafting and Animation</option>
                    </optgroup>

                    <optgroup label="(IA) Industrial Arts">
                        <option value="(ATS) Automotive Servicing">(ATS) Automotive Servicing</option>
                        <option value="(EIM) Electrical Installation And Maintenance">(EIM) Electrical Installation And Maintenance</option>
                        <option value="(EPAS) Electornic Products Assembly and Servicing">(EPAS) Electornic Products Assembly and Servicing</option>
                        <option value="(RAC) Refrigiration and Air-conditioning Servicing>(RAC) Refrigiration and Air-conditioning Servicing</option>
                    </optgroup>
                    </optgroup>
                </select>
            </td>
        </tr>
        </tfoot>
    </table>
            </form>
        </div>
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