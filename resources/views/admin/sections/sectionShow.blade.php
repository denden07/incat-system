@extends('layouts.teacherHome')

@section('section-status')

    active
@endsection

@section('section-list-status')
    active
@endsection

@section('title')
    {{$section->name}} Student list

@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @endsection

@section('contents')
    <div class="section-student-list">
    <h1>{{$section->name}}</h1>
    <p>Year: <span>{{$section->year}}</span></p>
     <p>Grade: <span>{{$section->level->name}}</span></p>
        <p>Strand: <span>{{$section->strand->name}}</span></p>
    <p>Adviser: <span>{{$section->adviser->name}}</span></p>



        <div class="container ">
            <h3 class="enlistment-list-banner">Student List</h3>
            <div class="row table-inner-design">
                <form action="{{route('admin.student.enlistment.bulkdelete')}}" method="post">
                    @csrf
                    @include('layouts._message')
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%;text-align: center;font-size: 20px">
                        <button type="button"   data-toggle="modal" class="btn-success section-add-student-button" data-target="#exampleModalCenter"><i class="fas fa-edit"></i></button>
                        <thead>
                        <tr>

                            <th>Id</th>
                            <th >Name
                            </th>
                            <th>Contact Number
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($section->students as $student)
                            <tr>
                                <td>{{$student->id}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->parentCpNo}}</td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>




        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Students to {{$section->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! Form::model($section,['method'=>'PATCH','action'=>['AdminSectionController@addStudentToSection',$section->id],'files'=>true]) !!}
                        @csrf
                        @method('PATCH')
                        <label for="">Student List</label>
                        {!!  Form::select('students[]',$students,null,['class'=>'form-control input-lg','multiple'=>'multiple','id'=>'multi-add-student'])!!}







                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="action" value="update">Save changes</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>




    </div>
 @endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
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
            $('#multi-add-student').select2(
                {
                   placeholder: "Add Students",
                    allowClear: true

                }
            );
        });

        $('#multi-add-student').select2().val({!!json_encode( $section->students-> pluck('id')) !!}).trigger('change');
    </script>

    <script>



        $(document).ready(function() {





            $('#datatable').DataTable(
                {

                    dom: 'Blfrtip',

                    lengthChange: true,
                    "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],

                    buttons: [
                     {
                            extend: 'pdf',
                            message: 'The information in this table is copyright to Sirius Cybernetics Corp. \n hey',
                        },
                    ],



                }
            );

        } );
    </script>
@endsection
